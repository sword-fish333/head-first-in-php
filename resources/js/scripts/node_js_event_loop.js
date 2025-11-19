
import fs from 'node:fs/promises'; // ← Changed from 'node:fs'
import net from 'net';

console.log('=== Event Loop Phase Example ===\n');

// Phase 1: TIMERS
setTimeout(() => {
    console.log('Timer 1: setTimeout 0ms');

    // This will run in the NEXT loop iteration
    setImmediate(() => {
        console.log('  -> setImmediate inside setTimeout');
    });
}, 0);

setTimeout(() => {
    console.log('Timer 2: setTimeout 100ms');
}, 100);

// Phase 5: CHECK (setImmediate)
setImmediate(() => {
    console.log('Check: setImmediate 1');

    process.nextTick(() => {
        console.log('  -> nextTick inside setImmediate');
    });
});

// Phase 3: POLL (I/O operations)
fs.readFile('./recursion.js', () => {
    console.log('Poll: File read complete');

    // Inside I/O callback, setImmediate runs before setTimeout
    setTimeout(() => {
        console.log('  -> setTimeout inside I/O callback');
    }, 0);

    setImmediate(() => {
        console.log('  -> setImmediate inside I/O callback');
    });

    // Microtask - runs immediately after this callback
    Promise.resolve().then(() => {
        console.log('  -> Promise inside I/O callback');
    });
});

// Phase 6: CLOSE callbacks
const server = net.createServer();
server.listen(0);
server.close(() => {
    console.log('Close: Server closed');
});

// MICROTASKS (run between ALL phases)
process.nextTick(() => {
    console.log('Microtask: nextTick 1');

    process.nextTick(() => {
        console.log('Microtask: nested nextTick');
    });
});

Promise.resolve().then(() => {
    console.log('Microtask: Promise 1');
});

console.log('Synchronous: Main script end');

async function readFilesParallel() {
    try {
        // All files read simultaneously - MUCH FASTER
        const [data1, data2, data3] = await Promise.all([
            fs.readFile('file1.txt', 'utf8'),
            fs.readFile('file2.txt', 'utf8'),
            fs.readFile('file3.txt', 'utf8')

        ]);

        return { data1, data2, data3 };
    } catch (err) {
        console.error('Error:', err.message);
        throw err;
    }
}

Promise.resolve().then(()=>console.log('resolve'))
process.nextTick(()=>{
    console.log('next tick');
})
// const data= await readFilesParallel();
// console.log('data from files:',data);
