function pola() {
    let str = "";

    let kalimat = "DUMBWAYSIDUJIAN";

    let arrKalimat = [...kalimat];

    const rows = 6;
    const cols = 10

    for (let row = 0; row < rows; row++) {
        for (let col = 0; col < cols; col++) {
            if (row % 2 == 1) {
                if (col >= (Math.ceil(cols/2) - row) && col <= (Math.ceil(cols/2) + row) && col % 2 == 1) {
                    let shiftArr = arrKalimat.shift()
                    str = str.concat(shiftArr);
                } else {
                    str = str.concat(" ");
                }
            } else {
                if (col >= (Math.ceil(cols/2) - row) && col <= (Math.ceil(cols/2) + row) && col % 2 == 0) {
                    let shiftArr = arrKalimat.shift()
                    str = str.concat(shiftArr);
                } else {
                    str = str.concat(" ");
                }
            }
        }
        str = str.concat("\n");
    }

    console.log(str);
}