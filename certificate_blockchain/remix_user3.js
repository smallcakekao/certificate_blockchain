var Web3 = require('web3');

window.addEventListener('load', async () => {
  // Modern dapp browsers...
  if (window.ethereum) {
    window.web3 = new Web3(ethereum);
    try {
      // Request account access if needed
      await ethereum.enable();
      // Acccounts now exposed
      
    } catch (error) {
      // User denied account access...
      
    }
  }
  // Legacy dapp browsers...
  else if (window.web3) {
    window.web3 = new Web3(web3.currentProvider);
    // Acccounts always exposed
    
    web3.eth.sendTransaction({/* ... */});
  }
  // Non-dapp browsers...
  else {
    console.log('Non-Ethereum browser detected. You should consider trying MetaMask!');
  }
});

 //看是在哪個鏈
 web3.version.getNetwork((err, netId) => {
  switch (netId) {
    case "1":
      console.log('This is mainnet')
      break
    case "2":
      console.log('This is the deprecated Morden test network.')
      break
    case "3":
      console.log('This is the ropsten test network.')
      break
    case "4":
      console.log('This is the Rinkeby test network.')
      break
    case "42":
      console.log('This is the Kovan test network.')
      break
    default:
      console.log('This is an unknown network.')
  }
})

 web3.eth.defaultAccount = "0x676bf1CBcB2B18F7342A0CaCC1D321771FF022B1";
 
 var num = web3.eth.accounts.length;
 console.log(num);
 var SignUpContract = web3.eth.contract([
	{
		"constant": false,
		"inputs": [
			{
				"name": "_str",
				"type": "string"
			}
		],
		"name": "change_verify",
		"outputs": [],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"constant": false,
		"inputs": [
			{
				"name": "_username",
				"type": "string"
			},
			{
				"name": "_email",
				"type": "string"
			},
			{
				"name": "_certificate_type",
				"type": "string"
			},
			{
				"name": "_pass",
				"type": "string"
			},
			{
				"name": "_score",
				"type": "uint256"
			},
			{
				"name": "_str",
				"type": "string"
			}
		],
		"name": "encryption",
		"outputs": [],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"inputs": [
			{
				"name": "_owner_name",
				"type": "string"
			}
		],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "constructor"
	},
	{
		"constant": true,
		"inputs": [
			{
				"name": "_str",
				"type": "string"
			}
		],
		"name": "search",
		"outputs": [
			{
				"name": "",
				"type": "string"
			},
			{
				"name": "",
				"type": "string"
			},
			{
				"name": "",
				"type": "string"
			},
			{
				"name": "",
				"type": "string"
			},
			{
				"name": "",
				"type": "uint256"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [
			{
				"name": "",
				"type": "uint256"
			}
		],
		"name": "user",
		"outputs": [
			{
				"name": "user_name",
				"type": "string"
			},
			{
				"name": "email",
				"type": "string"
			},
			{
				"name": "score",
				"type": "uint256"
			},
			{
				"name": "pass",
				"type": "string"
			},
			{
				"name": "verify_switch",
				"type": "bool"
			},
			{
				"name": "certificate_type",
				"type": "string"
			},
			{
				"name": "hash",
				"type": "bytes32"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [
			{
				"name": "_str",
				"type": "string"
			}
		],
		"name": "verify",
		"outputs": [
			{
				"name": "",
				"type": "bool"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [
			{
				"name": "_str",
				"type": "string"
			}
		],
		"name": "verify_second",
		"outputs": [
			{
				"name": "",
				"type": "bool"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [],
		"name": "whosowner",
		"outputs": [
			{
				"name": "",
				"type": "string"
			},
			{
				"name": "",
				"type": "address"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	}
]);

var message;
var string_hash 
var transaction = SignUpContract.at('0x08a133c608aB4C1c9827EaaF39F832290ee648Cb');
console.log(transaction);
 
var context;
var issuer;
var user_score;
var user_pass;
  
 


 
 window.onload = function () {
     document.getElementById('file123').onchange = readFile;
     //document.getElementById('certificate_upload').onchange = readFile;
 };
 
 

 function readFile() {
   console.log(this.files[0]);
   file = this.files[0];
   document.getElementById('filename').value = file.name;
   var fReader = new FileReader();           
   fReader.onload = function (event) {
     message = event.target.result;
	 var user = JSON.parse(message);
	 //console.log(user.certification.image);
	 context = user.certification.image;
	 issuer = user.certification.issuer.name;
     user_score = user.certification.score;
     user_pass = user.certification.pass;

     
   };
   fReader.readAsText(file);
 }
     console.log(web3.eth.defaultAccount);
