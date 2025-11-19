//SAT is basic boolean satisfiability
//(A or B) and (!A or C) is true;
//if A=false, B=false, C=false, than the formula (A or B) and (!A or C) is true
//3-SAT is a special case of SAT
//every clause in the parenthesis needs to have 3 literals. A literal is a variable or its negation
//3-SAT example: (X1 or X!2 or X3) and (!X1 or X2 or X4 ) and (X2 or !X3 or !X4)
//question: is there a way to assign true or false to X1, X2, X3 and X4 to make the entire formula true?
//3-SAT was the first problem proven NP-complete(Cook-Levin theorem)
//Any NP-complete problem can be reduced to it
/*
3-SAT problems are a special kind of sat problems with clauses with 3 literals strict
 */
//brute force 3-sat problem
import {dump} from "./utilities.js";

function isSatisfiable(variables, clauses) {
    const n = variables.length;
    const totalAssignments = Math.pow(2, n);

    for (let mask = 0; mask < totalAssignments; mask++) {
        const assignment = {};
        for (let i = 0; i < n; i++) {

            assignment[variables[i]] = Boolean(mask & (1 << i));
        }

        let allClauses = true;
        for (const clause of clauses) {
            const clauseValue = clause.some(literal => {
                if (literal.startsWith("¬")) {
                    const varName = literal.slice(1);
                    return !assignment[varName];
                }
                return assignment[literal];
            });
            if (!clauseValue) {
                allClauses = false;
                break;
            }
        }

        if (allClauses) return {satisfiable: true, assignment};
    }

    // if we finish the loop with no satisfying assignment
    return {satisfiable: false};
}

const variables2 = ["x1", "x2"];
const clauses2 = [
    ["x1", "x2"],     // At least one must be true
    ["¬x1", "x2"],   // At least one must be false
    ["x1", "¬x2"],    // x1 true OR x2 false
    ["¬x1", "¬x2"]
];


function threeSatProblem(variables, clauses) {
    if (!clauses.every(clause => clause.length === 3)) {
        throw new Error('Not a 3-SAT problem');
    }
    const n = variables.length;
    const allPossibilities = Math.pow(2, n);
    const assignments=[];
    for (let mask = 0; mask < allPossibilities; mask++) {
        const assignment = {};
        for (let i = 0; i < n; i++) {
            assignment[variables[i]] = Boolean(mask & (1 << i));
        }
        assignments.push(assignment);
        const satisfiesAll = clauses.every(clause => {
          return  clause.some(literal => {
                if (literal.startsWith('¬')) {
                    return !assignment[literal.slice(1)]
                }
                return assignment[literal]
            })
        })
        // if(satisfiesAll){
        //     return {isSatisfiable:true,assignment};
        // }
    }
    dump(assignments);

    return {isSatisfiable:false};
}


const variables = ["x1", "x2", 'x3'];
const clauses = [
    ["x1", "x2", 'x3'],
    ["¬x1", "¬x2", '¬x3'],
];
const forceUnsatisfiableVar = ["x1"];
const forceUnsatisfiableClauses = [
    ["x1", "x1", 'x1'],
    ["¬x1", "¬x1", '¬x1'],
];

const result = threeSatProblem(variables, clauses);
console.log('three sat problem:', result);
