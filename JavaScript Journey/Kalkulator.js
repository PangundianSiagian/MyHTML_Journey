const calculator = (operator, ...numbers) => {
    switch (operator) {
        case '+':
            return numbers.reduce((acc, num) => acc + num, 0);
        case '-':
            return numbers.reduce((acc, num) => acc - num);
        case '*':
            return numbers.reduce((acc, num) => acc * num, 1);
        case '/':
            return numbers.reduce((acc, num) => acc / num);
        case '%':
            return numbers.reduce((acc, num) => acc % num);
        default:
            return "Operator tidak valid!";
    }
};

console.log(calculator('+', 100, 20,)); 
console.log(calculator('-', 50, 10, 5));  
console.log(calculator('*', 2, 3, 4));    
console.log(calculator('/', 100, 5, 2));
console.log(calculator('%', 10, 3));      
