$(document).ready(function () {

    //on click to caste vote 
    $("#candidates-list").on("click", ".caste-vote", function (event) {
        var candidateIndex = event.target.id;
        var voterIndex = $(event.target).attr('class').split(' ')[3];
        var candidateDesig = $(event.target).attr('name');

        // alert("C is " + candidateIndex + " user id " + voterIndex + " desig " + candidateDesig);
        voteCaste(parseInt(voterIndex), parseInt(candidateIndex), candidateDesig);


    });

    async function voteCaste(voterId, voteId, candidateDesignation) {
    
        const res = await contra.vote(voterId, voteId, candidateDesignation + "", { from: web3.eth.accounts[1], gas: 3000000 });
        alert("Your Vote Casted!");
        window.location.replace("user.php")
    }

    // id of logged in user
    var user_id = $('.user_id').val();
    var user_name = $('.user_id').attr("name");
    // to store all voters data
    var votingData = [];
    // to store voter's index # from smart contract data, of logged in user
    var userIndex;
    // to store voted designations
    var candiDsignations = [];
    // to store candidate's index # from smart contract data
    var candidateData = new Array();


    async function main() {
        console.log("MAIN CALLED*** " + contra.getNumCandidate());
        if (contra.getNumCandidate() > 0 && contra.getNumVoter() > 0) {
            // interate through all voters data
            for (let i = 0; i < contra.getNumVoter(); i++) {
                const data = await contra.voters(i);
                // get index of logged In user
                // console.log("****** "+data[0].c[0]);
                if (data[0].c[0] == user_id) {
                    userIndex = i;
                    // alert("user index is "+i);
                }
                else {
                    alert("user index is not found");
                }
            }
            // get voting details of that user using that index
            const dataVoting = await contra.getMyVotedCandidates(userIndex);
            var candiIndex = [];

            // get candidate index of Smart contract array
            for (let j = 0; j < dataVoting.length; j++) {
                candiIndex.push(dataVoting[j].c[0]);
                // console.log(candiIndex);
            }
            //    map that index with DB candidate ID
            for (let k = 0; k < candiIndex.length; k++) {
                const dataCandidates = await contra.candidates(candiIndex[k]);
                // retrive their distinct dsignations
                votingData.push(dataCandidates[0].c[0]);
                if (!candiDsignations.includes(dataCandidates[2])) {
                    candiDsignations.push(dataCandidates[2]);
                }
            }

            //  get candidates details
            for (let i = 0; i < contra.getNumCandidate(); i++) {
                const response = await contra.candidates(i);
                const dataCandi = await response;
                candidateData[i] = new Array(dataCandi[0].c[0], dataCandi[1], dataCandi[2]);
            }

            // get data from DB and render view
            $.post("set-voting-data.php", { votingData: votingData, userIndex: userIndex, user_id: user_id, user_name: user_name, candiDsignations: candiDsignations, candidateData: candidateData },
                function (data) {
                    // alert(data);
                    $("#candidates-list").html(data);
                });
        } else {
            alert("candidates and voters not set");
            $.post("check-user-status.php", { user_id: user_id, user_name: user_name },
                function (data) {
                    // alert(data);
                    $("#candidates-list").html(data);
                });
        }
    }

    main();


});