function isPrimeNumber(input) {
    if (typeof input != 'number' && !Array.isArray(input)) {
        console.log("Ошибка: параметр должен быть числом или массивом чисел");
        return;
    }

    function isPrime(num) {
        if (num < 2) return false;
        for (let i = 2; i < num; i++) {
            if (num % i === 0) return false;
        }
        return true;
    }

    if (typeof input === 'number') {
        if (isPrime(input)) {
            console.log(input + " простое число");
        } else {
            console.log(input + " не простое число");
        }
    }

    if (Array.isArray(input)) {
        let primes = [];
        let notPrimes = [];

        for (let i = 0; i < input.length; i++) {
            if (typeof input[i] !== 'number') {
                console.log("Ошибка: элемент массива не число");
                return;
            }
            if (isPrime(input[i])) {
                primes.push(input[i]);
            } else {
                notPrimes.push(input[i]);
            }
        }

        if (primes.length > 0) {
            console.log(primes.join(", ") + " простые числа");
        }
        if (notPrimes.length > 0) {
            console.log(notPrimes.join(", ") + " не простые числа");
        }
    }
}

isPrimeNumber(3);
isPrimeNumber(4);
isPrimeNumber([3, 4, 5]);      