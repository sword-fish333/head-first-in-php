//without composition

const input='hello world!';

const result = input.toUpperCase().split(' ').reverse().join('-');
console.log('result:',result)


//with composition
const toUpperCase=str=>str.toUpperCase();
const words=str=>str.split(' ');
const reverse = arr => [...arr].reverse();
const join = separator => arr => arr.join(separator);

const manualCompose = join('-')(reverse(words(toUpperCase(input))));

console.log('manual composition:',manualCompose)


//pipe function
function pipe(...fns){
    return function (value){
        return fns.reduce((acc,fn)=>fn(acc),value);
    }
}
// Process user data through pipeline
const users = [
    { name: 'alice', age: 25, active: true, salary: 50000 },
    { name: 'bob', age: 30, active: false, salary: 60000 },
    { name: 'charlie', age: 35, active: true, salary: 70000 },
    { name: 'diana', age: 28, active: true, salary: 55000 }
];
const active=users=>users.filter(user=>user.active);
const over30=users=>users.filter(user=>user.age>30);
const getNames=users=>users.map(user=>user.name)
const activeUsers=pipe(active,over30,getNames)
console.log('process users through pipe:',activeUsers(users))
