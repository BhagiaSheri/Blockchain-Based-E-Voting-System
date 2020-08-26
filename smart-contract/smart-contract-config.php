<script>
    // initializing web3 object
	if (typeof web3 !== 'undefined') {
		web3 = new Web3(web3.currentProvider);
	} else {
		web3 = new Web3(new Web3.providers.HttpProvider("http://localhost:8545"));
	}

	web3.eth.defaultAccount = web3.eth.accounts[0];

	// set application binary interface 
	// of evote smart contract
	let electionContract = web3.eth.contract([{
			"constant": false,
			"inputs": [{
					"name": "_id",
					"type": "uint256"
				},
				{
					"name": "_name",
					"type": "string"
				},
				{
					"name": "_designation",
					"type": "string"
				}
			],
			"name": "addCandidate",
			"outputs": [],
			"payable": false,
			"stateMutability": "nonpayable",
			"type": "function"
		},
		{
			"constant": false,
			"inputs": [{
					"name": "_id",
					"type": "uint256"
				},
				{
					"name": "_name",
					"type": "string"
				}
			],
			"name": "addVoter",
			"outputs": [],
			"payable": false,
			"stateMutability": "nonpayable",
			"type": "function"
		},
		{
			"constant": false,
			"inputs": [{
				"name": "_voterId",
				"type": "uint256"
			}],
			"name": "authorize",
			"outputs": [],
			"payable": false,
			"stateMutability": "nonpayable",
			"type": "function"
		},
		{
			"constant": false,
			"inputs": [],
			"name": "end",
			"outputs": [],
			"payable": false,
			"stateMutability": "nonpayable",
			"type": "function"
		},
		{
			"constant": false,
			"inputs": [{
					"name": "_voterId",
					"type": "uint256"
				},
				{
					"name": "_voteIndex",
					"type": "uint256"
				},
				{
					"name": "_voteDesignation",
					"type": "string"
				}
			],
			"name": "vote",
			"outputs": [],
			"payable": false,
			"stateMutability": "nonpayable",
			"type": "function"
		},
		{
			"inputs": [{
				"name": "_name",
				"type": "string"
			}],
			"payable": false,
			"stateMutability": "nonpayable",
			"type": "constructor"
		},
		{
			"constant": true,
			"inputs": [{
				"name": "",
				"type": "uint256"
			}],
			"name": "candidates",
			"outputs": [{
					"name": "id",
					"type": "uint256"
				},
				{
					"name": "name",
					"type": "string"
				},
				{
					"name": "designation",
					"type": "string"
				},
				{
					"name": "voteCount",
					"type": "uint256"
				}
			],
			"payable": false,
			"stateMutability": "view",
			"type": "function"
		},
		{
			"constant": true,
			"inputs": [{
					"name": "s1",
					"type": "string"
				},
				{
					"name": "s2",
					"type": "string"
				}
			],
			"name": "compareStringsbyBytes",
			"outputs": [{
				"name": "",
				"type": "bool"
			}],
			"payable": false,
			"stateMutability": "pure",
			"type": "function"
		},
		{
			"constant": true,
			"inputs": [],
			"name": "electionName",
			"outputs": [{
				"name": "",
				"type": "string"
			}],
			"payable": false,
			"stateMutability": "view",
			"type": "function"
		},
		{
			"constant": true,
			"inputs": [{
				"name": "_voterId",
				"type": "uint256"
			}],
			"name": "getMyVotedCandidates",
			"outputs": [{
				"name": "",
				"type": "uint256[]"
			}],
			"payable": false,
			"stateMutability": "view",
			"type": "function"
		},
		{
			"constant": true,
			"inputs": [],
			"name": "getNumCandidate",
			"outputs": [{
				"name": "",
				"type": "uint256"
			}],
			"payable": false,
			"stateMutability": "view",
			"type": "function"
		},
		{
			"constant": true,
			"inputs": [],
			"name": "owner",
			"outputs": [{
				"name": "",
				"type": "address"
			}],
			"payable": false,
			"stateMutability": "view",
			"type": "function"
		},
		{
			"constant": true,
			"inputs": [],
			"name": "totalvotes",
			"outputs": [{
				"name": "",
				"type": "uint256"
			}],
			"payable": false,
			"stateMutability": "view",
			"type": "function"
		},
		{
			"constant": true,
			"inputs": [{
				"name": "",
				"type": "uint256"
			}],
			"name": "voters",
			"outputs": [{
					"name": "id",
					"type": "uint256"
				},
				{
					"name": "name",
					"type": "string"
				},
				{
					"name": "authorize",
					"type": "bool"
				},
				{
					"name": "voted",
					"type": "bool"
				},
				{
					"name": "voteCounter",
					"type": "uint256"
				}
			],
			"payable": false,
			"stateMutability": "view",
			"type": "function"
		}
	]);

	let contra = electionContract.at('0xd75b8Bc68257D1ef57c0Fb95D07a68D4ee8FE53a');
	console.log(contra);
</script>