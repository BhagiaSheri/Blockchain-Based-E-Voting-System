pragma solidity ^0.4.21;
contract Election{
    
    // Candidates structure
    struct Candidate{
        uint id;
        string name;
        string designation;
        uint voteCount;
    }
       // Voters structure
    struct Voter {
        uint id;
        string name;
        bool authorize;
        bool voted;
        uint voteCounter;
         uint[] vote;
         // to mapping designations
        mapping(uint => string)  designationMap;
        
    }
    // owner of smart contract
    address public owner;
    // name of election
    string public electionName;
    
    // arra of candidates in which structs will be pushed
    Candidate[] public candidates;
    // arra of voters in which structs will be pushed
     Voter[] public voters;
    //  total votes casted counter 
    uint public totalvotes;
    
    // modifier so that only owner of smart contrat can interact with functions
    modifier ownerOnly(){
        require(msg.sender == owner);
        _;
    }
    
    // constructor of smart contract
     constructor(string _name) public{
        owner = msg.sender;
        electionName = _name;
    }
   
    // function to return whom a voter has casted his votes, based on voter id    
   function getMyVotedCandidates(uint _voterId) ownerOnly public view returns(uint[]){
        return voters[_voterId].vote;
   }
   
    // to add candidates
    function addCandidate(uint _id, string _name, string _designation) ownerOnly public{
         candidates.push(Candidate(_id,_name,_designation,0));
    }
    
    // to add voters
    function addVoter(uint _id, string _name) ownerOnly public{
        // initially array for vote casted candidates is empty 
        uint[] memory temp;
        voters.push(Voter(_id, _name, false, false,0,temp));
    }
    
    //  get total candidates added
    function getNumCandidate() public view returns(uint){
        return candidates.length;
    }
    
     //  get total candidates added
    function getNumVoter() public view returns(uint){
        return voters.length;
    }
    
    // to authorize voters for vote casting
    function authorize(uint _voterId) ownerOnly public {
        voters[_voterId].authorize = true;
    }
    
    // to de-activate voters for vote casting
    function deActivateVoter(uint _voterId) ownerOnly public {
        voters[_voterId].authorize = false;
    }
    
    //  function to caste votes
    function vote(uint _voterId,uint _voteIndex, string _voteDesignation) public{
        // increment total votes casted by voter, based on _voteId
        voters[_voterId].voteCounter +=1;
        
        // check all casted votes 
        for(uint i = 0; i<voters[_voterId].voteCounter; i++ ){
            // if any casted voted contain designation same as voter want to caste again thn abort transaction
            require(!compareStringsbyBytes(voters[_voterId].designationMap[i],_voteDesignation));
        }
        // continue vote casting if voter is authorized 
        require(voters[_voterId].authorize);
        // add candidate to current voter's struct, for tracking casted vote    
        voters[_voterId].vote.push(_voteIndex);
        voters[_voterId].voted = true;
        // store designation of candidate 
        voters[_voterId].designationMap[ voters[_voterId].voteCounter] = _voteDesignation;
        // increase candidates vote
        candidates[_voteIndex].voteCount +=1;
        // increase total votes
        totalvotes += 1;
    }
    
    // function to compare 2 strings
    function compareStringsbyBytes(string memory s1, string memory s2) public pure returns(bool){
    return keccak256(abi.encodePacked(s1)) == keccak256(abi.encodePacked(s2));
}
    // function to end voting
    function end()  ownerOnly public{
        selfdestruct(owner);
    }
}