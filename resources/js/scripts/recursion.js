function reverseStringEfficient(str, index = 1) {
    console.log('index: ', index, ' str length: ', str.length);
    if (!str?.length || index > str.length) {
        return '';
    }
    return str[str.length - index] + reverseStringEfficient(str, index + 1);
}

// const reversed = reverseStringEfficient('hello');
// console.log('reversed: ', reversed);

class TreeNode {
    constructor(val, left = null, right = null) {
        this.val = val;
        this.left = left;
        this.right = right;

    }
}

// Method 1: Bottom-up (create leaves first, then combine)
const leaf1 = new TreeNode(1);
const leaf2 = new TreeNode(4);
const leaf3 = new TreeNode(8);

const node3 = new TreeNode(3, leaf1, leaf2);  // 3 with children 1 and 4
const root = new TreeNode(5, node3, leaf3);   // 5 with children 3 and 8

function treeHeight(node) {
    if (!node) {
        return -1
    }
    const leftHeight = treeHeight(node.left);
    const rightHeight = treeHeight(node.right);
    return 1 + Math.max(leftHeight, rightHeight);
}

// console.log('tree height: ',treeHeight(root))

function generateParentheses(n) {
    const result = [];

    function backtrack(current, open, close) {
        if (current.length === n * 2) {
            result.push(current);
            return;
        }
        if (open < n) {
            backtrack(current + "(", open + 1, close);
        }
        if (close < open) {
            backtrack(current + ")", open, close + 1);
        }
    }

    backtrack('', 0, 0);
    return result;
}
// Calculate distance between two cities

function compareGrowthRates(n) {
    console.log(`n = ${n}:`)
    console.log(`n log n= ${Math.floor(n * Math.log2(n))}`)
    console.log(`  n! = ${factorial(n)}`);
}

function factorial(n) {
    if (!n) {
        return 1
    }
    return n * factorial(n - 1);
}

// compareGrowthRates(5);   // What do you expect?
// console.log('-------------------')
// compareGrowthRates(10);  // And here?
// console.log('-------------------')
// compareGrowthRates(20);  // This will blow your mind!
// console.log('generateParentheses: ',generateParentheses(2))

function generateAllRoutes(cities) {
    const routes = [];
    const n = cities.length;

    function permute(remaining, current) {
        if (remaining.length === 0) {
            routes.push([0, ...current, 0]); // Start and end at city 0
            return;
        }

        for (let i = 0; i < remaining.length; i++) {
            const newRemaining = [...remaining.slice(0, i), ...remaining.slice(i + 1)];
            permute(newRemaining, [...current, remaining[i]]);
        }

    }

    // Start from city 0, permute the rest
    const otherCities = [];
    for (let i = 1; i < n; i++) {
        otherCities.push(i);
    }

    permute(otherCities, []);
    return routes;
}

function routeDistance(route, cities) {
    let total = 0;
    for (let i = 0; i < route.length; i++) {
        const currentCity = cities[route[i]];
        const nextCity = cities[route[(i + 1) % route.length]]; // Loop back to start
        total += distance(currentCity, nextCity);
    }
    return total;
}

function bruteForceTSP(cities) {
    const allRoutes = generateAllRoutes(cities);
    let minDistance = Infinity;
    let bestRoute = null;
    for (const route of allRoutes) {
        const distance = routeDistance(route, cities);
        if (distance < minDistance) {
            minDistance = distance;
            bestRoute = route;
        }
    }
    return {route: bestRoute, distance: minDistance};

}

let countFib = 0;

function fib(n) {
    countFib += 1;
    if (n <= 1) return n;
    return fib(n - 1) + fib(n - 2);
}

function fibDP(n) {
    const memo = {};
    let counter = 0;

    function helper(n) {
        counter += 1;
        if (n in memo) {
            return memo[n];
        }
        if (n <= 1) {
            return n;
        }
        memo[n] = helper(n - 1) + helper(n - 2);
        return memo[n]
    }

    const res = helper(n);
    console.log('counter for dynamic programming: ', counter);
    return res;
}

// console.log('naive fibonacci:', fib(20))
// console.log('count naive fibonacci:', countFib)
// console.log('fibonacci 2:', fibDP(20))
// console.log('bruteForceTSP:',bruteForceTSP(cities));

const fibBottomUp = n => {
    if (n <= 1) return n;
    const dp = [0, 1];
    for (let i = 2; i <= n; i++) {
        dp[i] = dp[i - 2] + dp[i - 1];
    }
    return dp[n];
}

// const coins = [1, 5, 10];

function findMinimumCoinsNr(coins, targetAmount) {
    if (targetAmount === 0) {
        return 0;
    }
    if (targetAmount < 0) {
        return -1;
    }
    let minCoins = Infinity;

    for (let i = 0; i < coins.length; i++) {
        if (coins[i] <= targetAmount) {
            const result = findMinimumCoinsNr(coins, targetAmount - coins[i]);
            if (result !== -1) {
                minCoins = Math.min(minCoins, result + 1)
            }
        }
    }
    return minCoins === Infinity ? -1 : minCoins;

}

function findMinCoinsNrDp(coins, target, memo = {}) {
    if (target === 0) return 0;
    if (target < 0) return Infinity;
    if (memo[target] !== undefined) return memo[target];
    let min = Infinity;
    for (let i = 0; i < coins.length; i++) {
        const result = findMinCoinsNrDp(coins, target - coins[i], memo);
        if (result !== Infinity) min = Math.min(min, result + 1);
    }
    memo[target] = min;
    return min;
}

// console.log(findMinCoinsNrDp([1,3, 5, 10], 8));  // Should return 2

const maxWeight = 50;//Knapsack problem

function knapsack(weights, values, capacity) {
    const n = weights.length;
    const dp = Array.from({length: n + 1}, () => Array(capacity + 1).fill(0))
    for (let i = 1; i <= n; i++) {
        for (let w = 0; w <= capacity; w++) {
            if (weights[i - 1] <= w) {
                dp[i][w] = Math.max(values[i - 1] + dp[i - 1][w - weights[i - 1]], dp[i - 1][w])
            } else {
                dp[i][w] = dp[i - 1][w];
            }
        }
    }
    return dp[n][capacity];
}


function knapsackRecursive(items, capacity, index = 0) {
    if (index >= items.length || capacity <= 0) {
        return 0;
    }
    const currentItem = items[index];

    //choice 1: skip this item
    const withoutItem = knapsackRecursive(items, capacity, index + 1);
    let newItem = 0;

    //choice 2:add this item if it fits
    if (currentItem.weight <= capacity) {
        newItem = currentItem.value + knapsackRecursive(items, capacity - currentItem.weight, index + 1);
    }
    return Math.max(newItem, withoutItem);
}

function knapsackMemo(items, capacity) {

    const memo = {};

    function helper(index=0, remainingCapacity) {
        console.log('memo ->',memo)
        const memoIndex = `${index}-${remainingCapacity}`;
        if (memoIndex in memo) return memo[memoIndex];
        if (index >= items.length || remainingCapacity <= 0) {
            return 0;
        }
        const currentItem=items[index];
        const withoutItem=helper(index+1,remainingCapacity);
        let newItem=0;
        if(currentItem.weight<=remainingCapacity){
            newItem=currentItem.value+helper(index+1,remainingCapacity-currentItem.weight);
        }
        memo[memoIndex]=Math.max(newItem,withoutItem);
        return memo[memoIndex];
    }
    return helper(0,capacity);
}


const items = [
    {weight: 1, value: 3},
    {weight: 3, value: 10},
    {weight: 4, value: 9}
];

// console.log(knapsackMemo(items, 5));

// const knapsack_sack = knapsack(weights, values, 5);
// console.log('knapsack value: ', knapsack_sack);
// knapsack(items, 100, 1);




const cities = [
    {name: 'A', x: 0, y: 0},
    {name: 'B', x: 1, y: 0},
    {name: 'C', x: 0, y: 1},
    {name: 'D', x: 1, y: 1},

]

function distance(a, b) {
    return Math.sqrt((a.x - b.x) ** 2 + (a.y - b.y) ** 2);
}
function verifyTour(cities,tour,maxDistance){
    console.log('cities ->',cities);
    let totalDistance=0;
    for(let i=0;i<tour.length;i++){
        const from=cities[tour[i]];
        const to = cities[tour[(i + 1) % tour.length]];
        console.log('from',from)
        console.log('to',to)

         totalDistance+=distance(from,to)
    }
    return totalDistance<=maxDistance;
}

function tspBruteForce(distances){
    const n=distances.length;
    const cities=[];
    for(let i=1;i<n;i++) cities.push(i);

    let minDistance=Infinity;
    let bestTour=null;
    function permute(arr,current=[]){
        if (arr.length===0){
            const tour = [0, ...current, 0];
            let distance = 0;
            for (let i = 0; i < tour.length - 1; i++) {
                distance += distances[tour[i]][tour[i + 1]];
            }

            if (distance < minDistance) {
                minDistance = distance;
                bestTour = tour;
            }
            return;
        }
        for (let i = 0; i < arr.length; i++) {
            const remaining = [...arr.slice(0, i), ...arr.slice(i + 1)];
            permute(remaining, [...current, arr[i]]);
        }
    }
    permute(cities);
    return {distance:minDistance,tour:bestTour};
}
// Test with 4 cities
const dist = [
    [0, 1, 3, 4],  // distances from city 0
    [1, 0, 2, 3],  // distances from city 1
    [3, 2, 0, 1],  // distances from city 2
    [4, 3, 1, 0]   // distances from city 3
];

console.log(tspBruteForce(dist));
// console.log('test: ',verifyTour(cities,[0,3],3))

