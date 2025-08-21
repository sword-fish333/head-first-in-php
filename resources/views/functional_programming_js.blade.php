<script>

    function curry(fn,length=fn.length){
        return (...args)=>{
            if(args.length>=length){
                return fn(...args);
            }
            return curry(
                (...nextArgs) => fn(...args, ...nextArgs),
                fn.length - args.length
            );
        }
    }

    const map = curry((fn, array) => {
        const result = [];
        for (let i = 0; i < array.length; i++) {
            result[i] = fn(array[i]);
        }
        return result;
    });
    const add = curry((a, b, c) => a + b + c);
    console.log('case 1:',add(1)(2)(3)); // 6
    console.log('case 2:',add(1, 2, 3)); // 6

    class Maybe{
        constructor(value) {
        this.value=value;
        }
        static of(value) {
            return new Maybe(value);
        }

    }
    //functie normala
    // function add(a,b){
    //     return a+b;
    // }

    function curriedAdd(a){
        return function(b){
            return a+b;
        }
    }
    console.log('curried',curriedAdd(1)(2));

    //sau cu sintaxa moderna
    const modernSintax=a=>b=>a+b;
    console.log('sintaxa moderna: ',modernSintax(2)(5))
</script>
