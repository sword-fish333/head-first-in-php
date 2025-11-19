function first(){
    console.log('first')
}

function second(){
    setTimeout(() => console.log("Second"), 0);
    console.log('third');
}

// second();
//
// setTimeout(()=>console.log('timeout'),1);
// setImmediate(()=>console.log('imidiate'));
//
// Promise.resolve().then(()=>console.log('promise'))
// console.log('sync!')

function blockingOperation() {
    console.log('Starting blocking operation...');

    // Simulate blocking with synchronous loop
  const start=Date.now();
    while (Date.now() - start < 3000) {
        // Blocks for 3 seconds - nothing else can run!
    }

    console.log('Blocking operation complete');
}
const start=Date.now();
setTimeout(()=>{
    console.log(Date.now()-start);
},1000)

process.nextTick(()=>{
    console.log('process next tick has a priority bigger than Promise')
})
// console.log('Before blocking');
// blockingOperation();
// console.log('After blocking'); // Has to wait 3 seconds
