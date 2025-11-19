import fs from 'node:fs/promises'; // ← Changed from 'node:fs'

function readFile(file_name){
    return fs.readFile(file_name).then(data=>{
        return data;
    })
}

// const transactions=JSON.parse(await readFile('../../../storage/app/transactions.json'));
// console.log('data from file:',transactions);


//parallel execution
function readFileParallel(){
    return Promise.all([
        fs.readFile('../../../storage/app/transactions.json'),
        fs.readFile('../../../storage/app/transactions2.json')

    ]);
}

async function promiseWithRace(){
    try{
        return await Promise.race([
           new Promise(resolve=>setTimeout(()=>{
               resolve('first in line!')
           },2000)),
            new Promise((_, reject) => setTimeout(() => {
                reject(new Error('error in promise!'))
            }, 1000))
        ]);
    }catch(e){
         console.log('error in promiseWithRace:',e)
        return 'error'
    }finally {
        console.log('finally!')
    }
}

const result=await promiseWithRace();
console.log('result:',result);
// const [transactions1,transactions2]=await readFileParallel();
// console.log('transactions:',JSON.parse(transactions1),JSON.parse(transactions2));
