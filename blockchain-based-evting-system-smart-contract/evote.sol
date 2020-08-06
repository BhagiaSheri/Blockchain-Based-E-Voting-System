pragma solidity ^0.4.0;

contract Evote {

    struct Candidate {
        string name;
        uint voteCount;  
    }

    struct Voter {
        bool voted;
        uint voteIndex;
        uint weight;
    }

    address public owner;
    string public name;
    mapping(address => Voter)public voters;
    Candidate[] public Candidates;
    uint public electionEnd;
    
    event ElectionResult(string name, uint voteCount);
    
    function Election(string _name, uint durationMinutes, string candidate1, string candidate2){
        owner = msg.sender;
        name = _name;
        electionEnd = now + (durationMinutes * 1 minutes);
        
        Candidates.push(Candidate(candidate1, 0));
        Candidates.push(Candidate(candidate1, 0));
    }
    
    function authorize(address voter) {
        require(msg.sender == owner);
        require(!voters[voter].voted);
        
        voters[voter].weight = 1;
    }
    
    function vote(uint voteIndex) {
        require(now < electionEnd);
        require(!voters[msg.sender].voted);
        
        voters[msg.sender].voted = true;
        voters[msg.sender].voteIndex = voteIndex;
        
        Candidates[voteIndex].voteCount += voters[msg.sender].weight;
    }
    
    function end() {
        require(msg.sender == owner);
        require(now >= electionEnd);
        
        for(uint i=0; i < Candidates.length; i++){
            ElectionResult(Candidates[i].name, Candidates[i].voteCount);
        }
    }
    
}
