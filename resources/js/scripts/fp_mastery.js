//pure function
const add=(a,b)=>a+b;

let count=0;

//impure function->depends on external state
function increment(){
    count++;
}

console.log(add(3,5));

//pure functions make code predictable and easy to change

const user={
    name:'Sword-Fish',
    age:32
}

//❌mutates the original object
user.age=33;

//immutable update
const updatedUser={...user,age:34}
// console.log('updated user: ',updatedUser)

//a high order function takes another function as an argument, or returns a function
//map is an example of HOF because it receives a function as an argument
const numbers=[1,2,3,4];
const doubled=numbers.map(nr=>nr*2);
// console.log(doubled);


function withLogging(fn){
    return function(...args){
        console.log('calling',fn.name);
        return fn(...args);
    }
}
const loggedAdd = withLogging(add);

// console.log(loggedAdd(2,3));

const users = [
    { name: 'Alice', age: 24 },
    { name: 'Bob', age: 17 },
    { name: 'Charlie', age: 31 }
];

const adults=users.filter(user=>user.age>=18).map(user=>user.name=user.name.toUpperCase())
    .reduce((acc,name)=>acc+', '+name);

console.log('adults: ',adults)

//you can write complex logic by combining functions->function composition
const toUpper=str=>str.toUpperCase();
const exclaim=str=>str+'!';
const greet=name=>`Hello ${name}`;
const excitedGreeting=name=>exclaim(toUpper(greet(name)));
console.log('greet:',excitedGreeting('dan'))
