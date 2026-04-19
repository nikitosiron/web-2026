<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

$method = $_SERVER['REQUEST_METHOD'];

// Разрешаем только POST запросы
if ($method !== 'POST') {
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'error' => 'Метод не разрешен. Используйте POST запрос.',
        'method' => $method
    ]);
    exit;
}

// 2. Получаем тело запроса
$inputJSON = file_get_contents('php://input');

if (empty($inputJSON)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'error' => 'Тело запроса пустое'
    ]);
    exit;
}

// 3. Парсим JSON
$data = json_decode($inputJSON, true);

if ($data === null) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'error' => 'Невалидный JSON формат',
        'received' => $inputJSON
    ]);
    exit;
}

// 4. Проверяем, есть ли поле image
if (!isset($data['image'])) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'error' => 'Поле "image" обязательно',
        'required_fields' => ['image', 'image_name (опционально)']
    ]);
    exit;
}

// 5. Получаем изображение (в формате base64)
$base64Image = $data['image'];

// Убираем префикс data:image/png;base64, если он есть
if (strpos($base64Image, 'base64,') !== false) {
    $base64Image = explode('base64,', $base64Image)[1];
}

// Декодируем base64
$imageData = base64_decode($base64Image);

// Проверяем, удалось ли декодировать
if ($imageData === false) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'error' => 'Не удалось декодировать base64 изображение'
    ]);
    exit;
}

// 6. Определяем тип изображения
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mimeType = finfo_buffer($finfo, $imageData);

// Разрешенные типы
$allowedTypes = [
    'image/jpeg' => 'jpg',
    'image/png' => 'png',
    'image/gif' => 'gif',
    'image/webp' => 'webp'
];

if (!isset($allowedTypes[$mimeType])) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'error' => 'Неподдерживаемый тип изображения',
        'supported_types' => array_keys($allowedTypes),
        'received_type' => $mimeType
    ]);
    exit;
}

$extension = $allowedTypes[$mimeType];

// 7. Генерируем имя файла
if (isset($data['image_name']) && !empty($data['image_name'])) {
    // Используем предоставленное имя
    $filename = preg_replace('/[^a-zA-Z0-9_-]/', '', $data['image_name']);
    $filename = $filename . '_' . time() . '.' . $extension;
} else {
    // Генерируем уникальное имя
    $filename = 'image_' . time() . '_' . uniqid() . '.' . $extension;
}

// 8. Создаем папку для картинок
$staticDir = __DIR__ . '/images';
if (!file_exists($staticDir)) {
    mkdir($staticDir, 0755, true);
}

// 9. Сохраняем файл (ИСПРАВЛЕНО: $staticDir, а не $staticDaticir)
$filePath = $staticDir . '/' . $filename;
$result = file_put_contents($filePath, $imageData);

// 10. Формируем URL (ИСПРАВЛЕНО: добавил слеш)
$baseUrl = $protocol . $host . '/home/static/images/' . $filename;

//БД
require_once __DIR__ . '/../config/database.php';

$connection = connectDatabase();

if (!isset($data['title']) || !isset($data['content']) || !isset($data['user_id'])) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'error' => 'Обязательные поля: title, content, user_id'
    ]);
    exit;
}

$query = "INSERT INTO post (title, subtitle, content, image, user_id) 
          VALUES (:title, :subtitle, :content, :image, :user_id)";

$statement = $connection->prepare($query);
$statement->execute([
    ':title' => $data['title'],
    ':subtitle' => $data['subtitle'] ?? '',
    ':content' => $data['content'],
    ':image' => 'static/images/' . $filename,
    ':user_id' => $data['user_id']
]);

$postId = $connection->lastInsertId();

// 11. Успешный ответ (добавил post_id)
echo json_encode([
    'success' => true,
    'message' => 'Пост успешно создан',
    'data' => [
        'post_id' => $postId,
        'filename' => $filename,
        'url' => $baseUrl
    ]
]);