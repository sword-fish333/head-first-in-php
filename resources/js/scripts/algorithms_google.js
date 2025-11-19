// Return indices of two numbers summing to target (assume exactly one answer)
import {dump} from "./utilities.js";

function sumTwo(nums, target) {
    const map = new Map();
    for (const [i, num] of nums.entries()) {
        const need = target - num;
        if (map.has(need)) return [map.get(need), i];
        map.set(num, i)
    }
    return null;
}

// console.log('twoSum: ', sumTwo([1, 10, 20, 33, 5, 16], 17))

//sliding window - longest substring without repeating chars
function lengthOfLongestString(string) {
    const last = new Map();
    let start = 0;
    let maxLength = 0;
    for (let i = 0; i < string.length; i++) {
        const item = string[i];
        if (last.has(item) && last.get(item) >= start) {
            start = last.get(item) + 1;
        }
        last.set(item, i);
        maxLength = Math.max(maxLength, i - start + 1)
    }

    return maxLength;
}

// console.log('lengthOfLongestSubstr: ', lengthOfLongestString('asdf123cdaxyz'))
//In javascript sets are used to remove duplicates from any other data structure. Set is one dimensional
let set = new Set();
set.add(1);
set.add('2');
set.add('alfa');
set.add('@')


//maps are used to store key value pairs. and a key is used to uniquely identify an element. Map is two-dimensional
let map = new Map();
map.set('ro', 'Romania');
map.set('gb', 'Great Britain');
map.set('fr', 'France');

class ListNode {
    //this is the building block of a single list
    constructor(val, next = null) {
        this.val = val;//stores the value
        this.next = next; //pointer to the next node
    }
}

//reverse a linked list
//time complexity is O(n) because each node is visited only once
//space complexity is O(1) because no extra memory is required, it uses just pointers
function reverseList(head) {
    let prev = null;
    let cur = head;
    while (cur) {
        const nxt = cur.next;
        cur.next = prev;
        prev = cur;
        cur = nxt;
    }
    return prev;
}


function printList(head) {
    const values = [];
    let cur = head;
    while (cur) {
        values.push(cur.val)
        cur = cur.next;
    }
    return values.join('->')
}

// console.log('printed list:',printList(n3));

// console.log('n3:',n3)
// console.log('reverse a list:',reverseList(n3));

//detect cycle: Floyd tortoise and Hare
function detectCycle(head) {
    let slow = head;
    let fast = head;
    while (fast && fast.next) {
        slow = slow.next;
        fast = fast.next.next; //each recursive step flips one link
        if (slow === fast) return true;//if there is a cycle the fast pointer(Hare) will eventually overlap the slow pointer
    } //if there is no cycle the fast pointer will hit null and stop
    return false;
}

function recursiveReverseList(head) {
    if (!head || !head.next) {
        return head;
    }
    const next = recursiveReverseList(head.next);
    head.next.next = head;
    head.next = null;
    return next;
}

const n1 = new ListNode(10)
const n2 = new ListNode(11);
const n3 = new ListNode(12);
const n4 = new ListNode(13);
const n5 = new ListNode(14);
n2.next = n3;
n3.next = n5;
n4.next = n3;
n5.next = n2;
n2.next = n1;
// console.log('cycle: ', detectCycle(n3))
// console.log('reverseListRecursive: ', recursiveReverseList(n4))


//stack/valid parenthesis
//a stack is a data structure used in computer science that works based on the principle Last in first out - LIFO;
//check balanced parenthesis for multiple types
function isValidParenthesisString(string) {
    const stack = [];
    const map = {")": "(", "]": "[", "}": "{"}
    for (const ch of string) {
        if (['(', '[', '{'].includes(ch)) {
            stack.push(ch)
        } else {
            if (stack.pop() !== map[ch]) return false;
        }
    }
    return true;
}


// console.log('isValidParenthesisString:', isValidParenthesisString('()[]{}'))

//Dynamic programming is useful when we care about subproblems


//bfs search
//bfs -go wide before go deep
//bfs uses FIFO
function bfs(start, adj) {
    const q = [start];
    const seen = new Set();
    const order = [];

    while (q.length) {
        const u = q.shift(); //inefficient, uses O(n)
        order.push(u);
        for (const v of adj[u] || []) {
            if (!seen.has(v)) {
                seen.add(v);
                q.push(v);
            }
        }
    }
    return order;
}


//in this total BFS runtime is O(v+E)
function bfsOptimized(start, adj) {
    const q = [start];
    const seen = new Set();
    const order = [];
    let head = 0;
    while (head < q.length) {
        const u = q[head++];
        order.push(u);
        for (const v of adj[u] || []) {
            if (!seen.has(v)) {
                seen.add(v);
                q.push(v);
            }
        }
    }
    return order;
}

const adj = {A: ['B', 'D'], B: ['D'], C: ['E'], D: ['Z'], E: []}

// console.log('bfs:',bfsOptimized("A",adj))

function bfsShortestPath(start, target, adj) {
    const q = [start];
    const distance = {[start]: 0};
    let head = 0;
    const seen = new Set();
    while (head < q.length) {
        console.log('head', head)
        const u = q[head++];
        console.log('u', u)
        if (u === target) return distance[u];

        for (const v of adj[u] || []) {
            if (!seen.has(v)) {
                seen.add(v);
                distance[v] = distance[u] + 1;
                q.push(v)
            }
        }
    }
    return -1;
}

const adjShortestPath = {A: ['B', 'C'], B: ['D'], C: ['E'], D: [], E: ['G'], G: []};
const start = 'A';
const target = 'G'
// console.log('shorted path:',bfsShortestPath(start,target,adjShortestPath))
//problem for depth first search: Given a graph as an adjacency list, return all nodes recheable from a starting node.
function depthFirstSearch(adjList, start, target, nodes = new Set()) {
    const map = new Map();
    for (const item of Object.entries(adjList)) {
        const [node, children] = item;
        if (node === start) {
            for (let i = 0; i < children.length; i++) {
                nodes.add(children[i]);
                depthFirstSearch(adjList, children[i], target, nodes)
            }
        }
    }
    return nodes;
}

const depthFirstGraph = {A: ['B', 'C'], B: ['D'], C: ['E'], D: [], E: []};

// console.log('depth first search: ',depthFirstSearch(depthFirstGraph,'A','E'))
function dfsCycleDetection(graph) {
    const seen = new Set();
    const stack = new Set();

    function dfs(u) {
        if (seen.has(u)) return true;
        if (stack.has(u)) return false;

        seen.add(u);
        stack.add(u);
        for (const v of graph[u] || []) {
            if (seen.has(v)) return true;
        }
        return false;
    }

    for (const node in graph) {
        if (dfs(node)) return true;
    }
    return false;
}

const cycles = {A: ['B'], B: ['C'], C: ['X']};
// console.log('cycles:', dfsCycleDetection(cycles))
//iterative depth first search

function dfsIterative(start, graph) {
    const stack = [start];
    const seen = new Set([start]);
    const order = [];
    while (stack.length) {
        const u = stack.pop();
        order.push(u);
        for (const v of graph[u] || []) {
            if (!seen.has(v)) {
                seen.add(v);
                stack.push(v);
            }
        }
    }
    return order;
}

const movies=[{
    name:'Movie A',
    rating:3,
},{
    name:'Movie B',
    rating:5,
},{
    name:'Movie C',
    rating:6,
},{
    name:'Movie D',
    rating:8,
},{
    name:'Movie E',
    rating:10,
}]
console.log('movies',movies.sort((a,b)=>b.rating-a.rating))
