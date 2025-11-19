function sideEffects() {
    const timestamp = Date.now();
    console.log('Date.now() has side effects:', timestamp, new Date().toJSON().slice(0, 10).replace(/-/g, '/'));
}

// sideEffects();
const numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
//built in high order functions
// console.log('add 2:',numbers.map(x=>x+2));
// console.log('odd nr:',numbers.filter(x=>x%2!==0));
// console.log('arithmetic media:',numbers.reduce((acc,x)=>acc+x,0)/numbers.length);


//create your own HOFS


//custom forEach function

function forEach(array, fn) {
    for (let i = 0; i < array.length; i++) {
        fn(array[i], i, array)
    }
}

// forEach(numbers,nr=>console.log(nr+2))


//custom map implementation
function map(array, fn) {
    const result = [];
    for (let i = 0; i < array.length; i++) {
        result.push(fn(array[i]))
    }
    return result;
}

// console.log('custom map result',map(numbers,nr=>nr*2))

//custom reduce function
function reduce(array, fn, initialValue) {
    let accumulator = initialValue;
    for (let i = 0; i < array.length; i++) {
        accumulator = fn(accumulator, array[i], accumulator)
    }
    return accumulator;
}

// console.log('custom reduce result',reduce(numbers,(accumulator,nr)=>{
//    console.log('accumulator',accumulator)
//     return accumulator*nr;
// },1))

// 3. Retry wrapper - retries failed operations
function withRetry(fn, maxAttempts = 3) {
    return async function (...args) {
        for (let attempt = 1; attempt <= maxAttempts; attempt++) {
            try {
                return await fn(...args);
            } catch (error) {
                if (attempt === maxAttempts) throw error;
                console.log(`Attempt ${attempt} failed, retrying...`);
            }
        }
    };
}

const unreliableAPI = async () => {
    if (Math.random() > .5) throw new Error('api request error!');

    return 'Success!';
}
// const reliableAPI = withRetry(unreliableAPI, 5);
// reliableAPI();
// console.log('unreliable api req:',reliableAPI)

//memoization - cache results for expensive functions:
function memoize(fn) {
    const memoize = new Map();

    return function (...args) {
        const key = JSON.stringify(args);

        if (memoize.has(key)) {
            console.log('return cached key');
            return memoize.get(key);
        }
        console.log('computing result');
        const res = fn(...args)
        memoize.set(key, res)
        return res;
    }
}

// Expensive fibonacci calculation
const fibonacci = (n) => {
    if (n <= 1) return n;
    return fibonacci(n - 1) + fibonacci(n - 2);
};

const memoizedFib = memoize(fibonacci);
// console.log(memoizedFib(10)); // Computes
function once(fn) {
    let hasRun = false;
    let result;

    return function(...args) {
        if (!hasRun) {
            result = fn(...args);
            hasRun = true;
        }
        return result;
    };
}
const initialize=once(()=>{
    console.log('initialize once!');
    return {initialized:true}
})
initialize()
initialize()
initialize()
