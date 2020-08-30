<!-- include web3j file reference for results-->
<script src="../../smart-contract/node_modules/web3/dist/web3.min.js"></script>
<script type="text/javascript" src =  
        "https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore-min.js" > 
        </script> 

<script type="text/javascript" src= 
        "https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore-min.js" > 
        </script> 
        <script type="text/javascript" src= 
        "https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore.js"> 
        </script> 
<?php
// smart contract deployed address file
// this address needs to be change on each deployment
include_once("../../smart-contract/smart-contract-config.php");
?>

<!-- smart contract scripting for fetching maximum no_of_votes --> -->

<script>

 
        



var arr =  [ 
                {prop1:"10", prop2:"07", prop3: "Geeks"}, 
                {prop1:"12", prop2:"86", prop3: "for"}, 
                {prop1:"11", prop2:"58", prop3: "Geeks."}  
            ]; 
            console.log(_.max(arr, function(o){return o.prop2;}));

    let candidates = []; //candidates max no_of_votes list

    votingWinners(); //fetch winner votes from blockchain

    let c_des = new Set();
    let max_votes = [];

    let filter = {
        designations: c_des,
        votes: max_votes
    };
    // get candidate id, designation and total votes from blockchain
    async function votingWinners() {
        for (let i = 0; i < contra.getNumCandidate(); i++) {
            const response = await contra.candidates(i);
            console.log("candidates: " + response);
            // Math.max.apply(Math, array.map(function(o) { return o.y; }))
            candidates.push({
                'cid': parseInt(response[0]),
                'designation': response[2],
                'no_of_votes': parseInt(response[3])
            });
        }

        console.log(candidates);

        candidates.forEach(function(candidate){
            c_des.add(candidate.designation);
            max_votes.push(Math.max.apply(Math, candidates.map(function(o) { return o.no_of_votes; })))
        });



        console.log(c_des);
        console.log(max_votes);

        console.log(_.max(candidates, function(o){return o.no_of_votes;})); 

        console.log(_.where(candidates, {designation: "Vice Chair"}, _.max(candidates, function(o){return o.no_of_votes;})));


        // get the index and current status of clicked voter
       // const res = candidates.filter(candidate = () => candidate.designation);

        // if(candidate.cid == candidate_ids[index].c_id){
        //     //add the no_of_votes in table column
        //    document.querySelectorAll(".candidate_votes")[index].innerHTML = candidate.no_of_votes;
        // }
       // console.log(res);
    }
    //end of smart contract scripting
</script>