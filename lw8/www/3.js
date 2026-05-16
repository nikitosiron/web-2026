function uniqueElements(arr) {
  const result = {};

  for (let item of arr) {
    const key = String(item);

    if (result[key]) {
      result[key]++;
    } else {
      result[key] = 1;
    }
  }

  return result;
}

const data = ['привет', 'hello', 1, '1'];
console.log(uniqueElements(data)); 