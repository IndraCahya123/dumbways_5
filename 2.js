function transpose(arr) {
    if(arr.length == 1) return arr;

    let newArr = [];

    for (let row = 0; row < arr[0].length; row++) {
        newArr[row] = [];
        for (let col = 0; col < arr.length; col++) {
            newArr[row].push(arr[col][row]);
        }
    }

    console.log(newArr)
}