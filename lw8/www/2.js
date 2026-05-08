function countVowels(str) {
    let Vowels = ["а", "е", "ё", "и", "о", "у", "ы", "э", "ю", "я"];
    let countVowels = 0;
    for(let i = 0; i < str.length; i++){
        if (Vowels.includes(str[i])) countVowels++;
   }
   return countVowels;    
}

console.log(countVowels("Привет, мир!"));
console.log(countVowels("Как дела?"));    
console.log(countVowels("Привет"));  