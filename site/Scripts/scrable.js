process.stdin.setEncoding('utf-8');

console.log('Enter a series of words separated by space. Enter 1 to quit.');
process.stdin.on('data', (data) => {
    // data will contain the terms entered by user
    if (data == '1\n') {
        process.exit();
    }

    // Create an array of words entered by user
    const sentenceArray = data.toString().slice(0, -1).toLowerCase().split(' ');

    // here toString converts the data entered by user into string, slice removes the last element i.e \n
    // from the data, toLowerCase is used to convert the data into lower case, and finally split will separate the
    // words by space in add then into array

    const pointsObjectArray = []; // this array will contain all the words with their individual points

    sentenceArray.forEach(element => {

        // here we are further creating another array for each word of sentence 
        const word = element.toString().split('');

        // join will concat the character into words again
        let pointsObject = {word: word.join(''), points: 0};
        let points = 0;
        word.forEach(character => {
            // getPoint is a method which return point of each character based on given table in description
            points += getPoint(character);
        })
        pointsObject.points = points;
        pointsObjectArray.push(pointsObject);
    });
    // method to print the max points word
    printMax(pointsObjectArray);
})

function getPoint(character) {
    // we will use switch case to check for point
    let characterValue;
    switch (character) {
        case 'd':
        case 'g':
            characterValue = 2
            break;
        case /[bcmp]/.test(character):
            characterValue = 3;
            break;
        case /[fhvwy]/.test(character):
            characterValue = 4;
            break;
        case 'k':
            characterValue = 5;
            break;
        case 'j':
        case 'x':
            characterValue = 8;
            break;
        case 'q':
        case 'z':
            characterValue = 10;
            break;
        default:
            characterValue = 1;
            break;
    }
    return characterValue;
}

function printMax(objectsArray) {
    // reduce method will get the object with max points
    const maxPointObject = objectsArray.reduce((prev, current) => (prev.points > current.points) ? prev : current);
    console.log(`The word ${maxPointObject.word} has max points: ${maxPointObject.points}`);
}