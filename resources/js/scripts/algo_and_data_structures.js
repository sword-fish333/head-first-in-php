//given an array of numbers return index of 2 numbers that sum up to target
function twoSum(nums, target) {
    if (!nums) {
        return -1;
    }
    for (let i = 0; i < nums.length; i++) {
        for (let j = 1; j <= nums.length; j++) {
            if (nums[i] + nums[j] === target) {
                return [i, j];
            }
        }
    }
    return 0;
}

function twoSumOptimised(nums, target) {
    const seen = new Map();
    for (let i = 0; i < nums.length; i++) {
        const want = target - nums[i];
        if (seen.has(want)) return [seen.get(want), i];
        seen.set(nums[i], i);
    }
    return 0;
}

function bfsShortest(adjList, start, target) {
    const q = [];
    const seen = new Set([start]);
    q.push([start, 0]);
    while (q.length) {
        const [u, d] = q.shift();
        if (u === target) return d;
        for (const v of (adjList[u] || [])) {
            if (!seen.has(v)) {
                seen.add(v);
                q.push([v, d + 1])
            }
        }
    }
    return -1;
}

const adjList = {
    A: ['B', 'C'],
    B: ['A', 'D', 'E'],
    C: ['A', 'F'],
    D: ['B'],
    E: ['B', 'F'],
    F: ['C', 'E']
};

function bfsSearchSimple(adj, start, target) {
    let q = [[start, 0]];
    let seen = {[start]: true};
    while (q.length) {
        const [u, d] = q.shift();
        if (u === target) return d;
        for (let v of (adj[u] || [])) {
            if (!seen[v]) {
                seen[v] = true;
                q.push([v, d + 1]);
            }
        }
    }
    return -1;
}

// console.log('bfsSearchSimple', bfsSearchSimple(adjList, 'A', 'E'))
// console.log('bfsShortest: ', bfsShortest(adjList, 'B', 'E'));

// console.log('two sum: ',twoSum([1,5,55,10,13,22,7,61],64))
// console.log('two sum optimized: ', twoSumOptimised([1, 10, 20, 30, 12, 31, 7], 17))


function tspGreedy(distances) {
    const n = distances.length;
    const visited = new Set([0]);
    const tour = [0];
    let current = 0;
    while (visited.size < n) {
        let nearest = -1;
        let minDist = Infinity;
        for (let i = 0; i < n; i++) {
            if (!visited.has(i) && distances[current][i] < minDist) {
                minDist = distances[current][i];
                nearest = i;
            }
        }
        visited.add(nearest);
        tour.push(nearest);
        current = nearest;
    }
    tour.push(0);
    return tour;
}

const dist = [
    [0, 1, 3, 4],  // distances from city 0
    [1, 0, 2, 3],  // distances from city 1
    [3, 2, 0, 1],  // distances from city 2
    [4, 3, 1, 0]   // distances from city 3
];

// console.log('tspGreedy: ',tspGreedy(dist));
const graph = {
    A: ['B', 'C'],
    B: ['A', 'D'],
    C: ['A', 'E'],
    D: ['B', 'E'],
    E: ['C', 'D']
};

function bfsShortest2(adj, start, target) {
    let q = [[start, 0]];
    const seen = new Set([start]);
    while (q.length) {
        const [u, d] = q.shift();
        if (u === target) return d;
        for (const v of adj[u]) {
            if (!seen.has(v)) {
                seen.add(v);
                q.push([v, d + 1])
            }
        }
    }
}

function dfsPath(adj, start, target, seen = new Set()) {
    if (start === target) return [start];
    seen.add(start);
    for (const v of adj[start]) {
        if (!seen.has(v)) {
            const path = dfsPath(adj, v, target, seen);
            if (path) return [start, ...path];
        }
    }
    return null;
}

function getLengthOfDfs(adj, start, target) {
    const res = dfsPath(adj, start, target);
    return res ? res.length : -1;
}

function allPossiblePaths(adj, start, target, seen = new Set()) {
    if(start===target) return [[target]];
    seen.add(start)
    const allPaths=[];
    for (const v of adj[start]) {
        if (!seen.has(v)) {
            const subPaths = allPossiblePaths(adj, v, target, seen);
            for(const p of subPaths){
                allPaths.push([start,...p])
            }
        }
    }
    seen.delete(start) //backtrack
    return  allPaths;
}
function shortestPath(adj,start,target){
    const allPaths=allPossiblePaths(adj,start,target);
    let shortestPath = allPaths[0].length;
    for (const path of allPaths) {
        if (path.length < shortestPath) {
            shortestPath = path.length
        }
    }
    return shortestPath;
}

// console.log('BFS shortest path: ', bfsShortest2(graph, 'A', 'E'));
console.log('DFS one path: ', shortestPath(graph, 'C', 'E'))
