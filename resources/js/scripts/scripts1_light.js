function sumPositives(array){
    let sum=0;
    for(const nr of array){
        if(nr>0){
            sum+=nr;
        }
    }
    return sum;
}

console.log('sm positives: ',sumPositives([-1,-10,-11,10,20]))
