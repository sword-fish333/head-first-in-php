import fs from 'fs';
import crypto from 'crypto';
// console.log('start');
// setTimeout(()=>console.log('timeout'),0);
// setImmediate(()=>console.log('imidiate!'));
// Promise.resolve().then(()=>console.log('promise'));
// process.nextTick(()=>console.log('next tick'));
// console.log('end flow of execution')
// setTimeout(()=>{
//     console.log('timeout');
// },0)
// setImmediate(()=>console.log('setImmediate!'))
// fs.readFile('./recursion.js',()=>{
//    setTimeout(()=>{
//        console.log('timeout');
//    },0)
//     setImmediate(()=>console.log('setImmediate!'))
// });
// process.nextTick(()=>console.log('next tick'))
//
// setTimeout(async()=>{
//     await Promise.resolve().then(()=>console.log('promise executed'));
//
// })

// console.log('1');

// setTimeout(() => {
//     console.log('2');
//     Promise.resolve().then(() => console.log('3'));
// }, 0);

// process.nextTick(() => console.log('5'));
// Promise.resolve().then(() => console.log('4'));


// for (let i = 0; i < 5; i++) {
//     crypto.pbkdf2('password', 'salt', 100000, 64, 'sha512', () => {
//         console.log('done', i);
//     });
// }

// console.log('6');
// setTimeout(() => console.log('timeout 1'), 0);
// setTimeout(() => console.log('timeout 2'), 0);
console.log('A');
setTimeout(()=>console.log('B'));
process.nextTick(()=>console.log('D'));
Promise.resolve().then(()=>console.log('C'));
console.log('E')
