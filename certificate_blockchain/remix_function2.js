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


/*if (typeof web3 !== 'undefined') {
     web3 = new Web3(web3.currentProvider);
 } else {
     // 設定欲連線的節點位置
     //web3 = new Web3(new Web3.providers.HttpProvider("http://localhost:8545"));
     alert('initial failed');
 }*/

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
 //ropsten
  /*if (typeof web3 !== 'undefined') {
    web3 = new Web3(web3.currentProvider);
  } else {
      // set the provider you want from Web3.providers
      web3 = new Web3(new Web3.providers.HttpProvider("https://ropsten.infura.io/<your-api-key>"));
  }*/

 web3.eth.defaultAccount = "0x676bf1CBcB2B18F7342A0CaCC1D321771FF022B1";
 //var defaultAccount = web3.eth.defaultAccount;
 /*if(!defaultAccount) {
         web3.eth.defaultAccount = web3.eth.accounts[0];
         defaultAccont = web3.eth.accounts[0];
 }*/
 
 //console.log("web3.eth.defaultAccount:", web3.eth.defaultAccount);
 //web3.eth.defaultAccount = web3.eth.accounts[0];
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
		"name": "encryption",
		"outputs": [],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"inputs": [],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "constructor"
	},
	{
		"constant": true,
		"inputs": [],
		"name": "getblockhash",
		"outputs": [
			{
				"name": "",
				"type": "bytes32[]"
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
				"type": "string"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	}
]);

var message;
var string_hash 
var transaction = SignUpContract.at('0x79f6a4fb204f9f561c14e6ef8c67442fcf50a390');
console.log(transaction);
 
 

 $("#verify").click(function(){
   //console.log(message);
   string_hash = hex_sha256(message);
   //var hashvalue = document.getElementById('string_hash').value;
   //console.log(transaction.verify(string_hash));
   transaction.verify(string_hash, function (err, result) {
    //console.log(err, result);
    if(!err)
      if(result =="YES")
        alert("驗證完成");
      else
        alert("無此證書");
    }) 
});
 
 window.onload = function () {
     document.getElementById('file123').onchange = readFile;
 };
 
 function readFile() {
   console.log(this.files[0]);
   file = this.files[0];
   
   document.getElementById('filename').value = file.name;
   var fReader = new FileReader();           
   fReader.onload = function (event) {
     message = event.target.result;
     //var JSON_message = JSON.parse(message).certification.issuer.image;
     //console.log(JSON_message);
   };
   fReader.readAsText(file);
 }

     console.log(web3.eth.defaultAccount);
