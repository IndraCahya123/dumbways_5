function palindrom(number) {

    if((typeof number) !== (typeof 1)) return console.log(`Parameter harus berupa angka`);

    const reverseNumb = number.toString().split("").reverse().join("");

    if(parseInt(reverseNumb) !== number) return console.log(`${number} bukan bilangan palindrom`);

    return console.log(`${number} adalah bilangan palindrom`);
}