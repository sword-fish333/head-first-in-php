<x-layout>

    <!-- Main Content -->
    <div class="container mx-auto py-10 lg:pl-72">
        <x-page_header backRoute="/" title="NP Complete"/>
        <section id="core_concepts" class="scroll-mt-20">
            <x-info_box>
                <x-section_title title="Core concepts" class="mb-1"/>
                <br>
                <p><b>P (Polynomial Time):&nbsp;</b>
                    Problems that can be solved in polynomial time (O(n), O(n²), O(n³), etc.). These are "easy" problems
                    for computers.</p>
                <br>
                <p><b>NP (Nondeterministic Polynomial Time):&nbsp;</b>
                    Problems whose solutions can be verified in polynomial time. If someone gives you a potential
                    answer, you can check if it's correct quickly, but finding that answer might be hard.</p>
                <br>
                <p><b>NP-Complete:&nbsp;</b>
                    The "hardest" problems in NP. These problems are:
                </p>
                <ul>
                    <li>In NP (solutions can be verified quickly)</li>
                    <li>Every other NP problem can be reduced to them</li>
                    <li>Think of it this way: If you could magically solve any NP-complete problem quickly, you could
                        solve ALL NP problems quickly!
                    </li>
                </ul>
            </x-info_box>
        </section>
    </div>
    <x-slot:js>
        <script>
            //example of javascript implementation of subset sum problem
            // function verifySubsetSum(array, subset, target) {
            //     let sum = 0;
            //     for (let index of subset) {
            //         sum += array[index];
            //     }
            //     return sum === target;
            // }
            // // But FINDING the subset... that's the hard part
            // function findSubsetSum(array, target) {
            //     // Naive approach: try all 2^n possible subsets
            //     // This is exponential time - NOT polynomial!
            //
            //     function trySubsets(index, currentSum, subset) {
            //         if (currentSum === target) return subset;
            //         if (index >= array.length || currentSum > target) return null;
            //
            //         // Try including current element
            //         let withCurrent = trySubsets(
            //             index + 1,
            //             currentSum + array[index],
            //             [...subset, index]
            //         );
            //         if (withCurrent) return withCurrent;
            //
            //         // Try excluding current element
            //         return trySubsets(index + 1, currentSum, subset);
            //     }
            //
            //     return trySubsets(0, 0, []);
            // }
            //
            // // Example usage
            // let array = [3, 34, 4, 12, 5, 2];
            // let target = 50;
            // let result = findSubsetSum(array, target); // Might find [0, 5] which gives us 3+2=5... wait no, [2, 4] gives us 4+5=9!
            // const final_res=[];
            // for (let index of result){
            //     console.log('index ->',index)
            //     final_res.push(array[index])
            // }
            // class MeetingScheduler {
            //     constructor(){
            //         this.maxTimeSlots=20;
            //         this.priority=['critical','normal','optimal'];
            //         this.maxAttendeesPerMeeting=10;
            //         this.maxRoomOptions=5;
            //
            //     }
            // }
            //
            // function findItemInArray(arr,target){
            //     for(let i=0;i<arr.length;i++){
            //         if (arr[i] === target) return i;
            //     }
            //     return -1;
            // }
            //
            // function printPairs(arr){
            //     for(let i=0;i<arr.length;i++){
            //         for(let j=0;j<arr.length;j++){
            //             console.log(arr[i],arr[j]);
            //         }
            //     }
            // }
            // printPairs([1,2,5,10])
            //O(1)-constant time
            function getFirstElement(arr) {
                return arr[0];
            }

            //O(log n)-logarithmic (like binary search)
            function binarySearch(sortedArr, target) {
                let left = 0, right = sortedArr.length - 1;
                while (left <= right) {
                    let mid = Math.floor((left + right) / 2);
                    if (sortedArr[mid] === target) return mid;
                    if (sortedArr[mid] < target) {
                        left = mid + 1;
                    } else {
                        right = mid - 1;
                    }
                }
                return -1;
            }

            function merge(left, right) {
                const result = [];
                let i = 0, j = 0;

                while (i < left.length && j < right.length) {
                    if (left[i] < right[j]) {
                        result.push(left[i]);
                        i++;
                    } else {
                        result.push(right[j]);
                        j++;
                    }
                }

                // Add any leftover elements
                return result.concat(left.slice(i)).concat(right.slice(j));
            }

            //O(n log n)-common in efficient sorting
            function mergeSort(arr) {
                if (arr.length <= 1) return arr;

                const mid = Math.floor(arr.length / 2);
                const left = mergeSort(arr.slice(0, mid));
                const right = mergeSort(arr.slice(mid));

                return merge(left, right);  // merge is O(n)
            }

            // console.log('mergeSort: ',mergeSort([8,12,3,44,56,6]))
            // console.log('binary search: ',binarySearch([3,33,333,3333],333))
            // console.log('first element:',getFirstElement([5,4,3,2,1]));
            // console.log(findItemInArray([1,5,10],10))

            // Subset Sum Problem: Can numbers in array sum to target?

            function canSubSetSum(numbers, target) {
                function checkSubsets(index, currentSum) {
                    console.log('index: ',index);
                    console.log('current sum: ',currentSum)
                    if (currentSum === target) return true;
                    if (index >= numbers.length) {
                        console.log('index from numbers.length: ',index);
                        return false;
                    }

                    return checkSubsets(index + 1, currentSum + numbers[index]) || checkSubsets(index + 1, currentSum);
                }

                return checkSubsets(0, 0);
            }

            const arr = [1, 2, 5, 10];
            // console.log('element 4:',arr[4]);
            // console.log('canSubSetSum =>', canSubSetSum(arr, 16))

            // But VERIFYING a solution is easy - O(n)!
            function verifySubsetSum(numbers, indices, target) {
                let sum = 0;
                for (let i of indices) {
                    sum += numbers[i];
                }
                return sum === target;
            }

            function countdown(n){
                console.log(n);
                if(n>0){
                    countdown(n-1);
                }
            }
            function mystery(n){
                if(n<=0) return;
                mystery(n-1);
                console.log(n);
            }
            // mystery(5);
        function sumArray(arr,index=0){
                if(!arr.length || index===arr.length){
                    return 0;
                }
                return arr[index]+sumArray(arr,index+1);
        }

        function reverseString(str){
                if(!str.length){
                    return '';
                }
                return str[str.length-1]+reverseString(str.slice(0,-1))
        }

        function reverseStringEfficient(str,index=1){
                console.log('index: ',index,' str length: ',str.length);
                if(index===str.length-1){
                    return '';
                }
                return str[str.length-index]+reverseString(str,index+1);
        }

        // console.log('recursive sum array: ',sumArray([1,3,5,7]))
        </script>
    </x-slot:js>
</x-layout>
