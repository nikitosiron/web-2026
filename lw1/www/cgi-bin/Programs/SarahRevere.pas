PROGRAM SarahRevere(INPUT, OUTPUT);
USES
  DOS;
VAR
  W1, W2, W3, W4: CHAR;
  Looking, Land, Sea: BOOLEAN;
  QueryString: STRING;
  i: INTEGER;

PROCEDURE MoveWindow(VAR W1, W2, W3, W4: CHAR);
BEGIN
  W1 := W2;
  W2 := W3;
  W3 := W4;
  READ(W4)
END; 

PROCEDURE WriteRes(VAR Land, Sea: BOOLEAN);
BEGIN
  IF NOT (Land OR Sea)
  THEN
    WRITELN('Sarah didn''t say');
  IF Land
  THEN
    WRITELN('The british are coming by land');
  IF Sea
  THEN
    WRITELN('The british are coming by sea')
END;

BEGIN {SarahRevere}  
  WRITELN('Content-Type: text/plain');
  WRITELN;  
  
  {Инициализация}
  W1 := ' ';
  W2 := ' ';
  W3 := ' ';
  W4 := ' ';
  Land := FALSE;
  Sea := FALSE;
  
  QueryString := GetEnv('QUERY_STRING');
  
  IF GetEnv('REQUEST_METHOD') = 'POST' 
  THEN
    BEGIN
      QueryString := '';
      WHILE NOT EOLN 
      DO
        BEGIN
          READ(W4);
          QueryString := QueryString + W4
        END
    END;
  
  Looking := LENGTH(QueryString) > 0;
  i := 1;
  
  WHILE (i <= LENGTH(QueryString)) AND NOT(Land OR Sea) 
  DO
    BEGIN
      {Сдвигаем окно}
      W1 := W2;
      W2 := W3;
      W3 := W4;
      W4 := QueryString[i];
      {Проверяем на "land"}
      IF (i >= 4) 
      THEN
        Land := (QueryString[i-3] = 'l') AND (QueryString[i-2] = 'a') AND 
                (QueryString[i-1] = 'n') AND (QueryString[i] = 'd');    
      {Проверяем на "sea"}
      IF (i >= 3) 
      THEN
        Sea := (QueryString[i-2] = 's') AND (QueryString[i-1] = 'e') AND (QueryString[i] = 'a');  
      i := i + 1
    END;    
  WriteRes(Land, Sea)
END.  {SarahRevere}
