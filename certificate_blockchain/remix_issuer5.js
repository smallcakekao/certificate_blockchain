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

web3.eth.getAccounts(function (err, addresses) {
	const address = addresses[0];
	web3.eth.defaultAccount = address;
  });
 
 var num = web3.eth.accounts.length;
 console.log(web3.eth.defaultAccount);
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
				"name": "str",
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
var transaction = SignUpContract.at('0xeeea81ca7c9E097FC59A7546396BA1607C95Bc55');
console.log(transaction);

 $("#certificate_upload").change(function(){
    file = this.files[0];
   document.getElementById('filename').value = file.name;
 })
 
 $("#button").click(function() {
  transaction.get(function(error, result){
     if(!error)
     {	var hash_value = result[0];
         var i = 1;
         for (i = 1; result[i] != null; i++ ) {
           hash_value = hash_value + "\n" + result[i];
         }
         document.getElementById('fileContent').value = hash_value;
         console.log(result);
     }
     else
       console.error(error);
   });
 });
     
$("#userdata").click(function(){
  var today=new Date();
  
  var currentDateTime =
  
  today.getFullYear()+'年'+
  
  (today.getMonth()+1)+'月'+
  
  today.getDate()+'日 ('+
  
  today.getHours()+'點'+today.getMinutes()+'分)';
  
  const nameElement = document.getElementById("form");

  var JSON_string ={
    issuedOn: currentDateTime,
    recipient: {
      identity: nameElement[9].value,
      name: nameElement[8].value,
      Test_Time:nameElement[10].value,
      type: "email",
      Email: nameElement[11].value,
      Birth: nameElement[13].value,
      Sex: $("[name='sex']:checked").val()
    },
    type: "Certificate",
    Verification_address: "0xde37a07f274497caf98200e8bbf2bbcc34128445",
    certification: {
      issuer: {
        name: nameElement[7].value,
        email: nameElement[4].value,
        addrss: nameElement[6].value,
        Tel: nameElement[5].value,
        type: "Profile"
      },
      examtype: nameElement[12].value,
      score: nameElement[14].value,
      pass: $("[name='pass']:checked").val(),
      image: data_base64,
      description: "證書相關資訊",
      signatureLines: 
        {
          jobTitle: nameElement[3].value+" Issuer",
          name: nameElement[3].value+"_SignatureLines",
          type: "SignatureLine",
        }
    },
    id: nameElement[8].value + "_"+nameElement[3].value+"_CERTIFICATION",
    recipientProfile: {
      name: "verifiy_on_ether",
      type:"verifiy"
    }
}

message = JSON.stringify(JSON_string);
var _pass = $("[name='pass']:checked").val();
//console.log(JSON_string.certification.image);
document.getElementById("JSONContent").value = JSON.stringify(JSON_string);
  string_hash = hex_sha256(JSON_string.certification.image);
  console.log(string_hash);
   transaction.encryption(nameElement[8].value,nameElement[11].value,nameElement[12].value,_pass,nameElement[14].value,string_hash, function (err, result) {
    
    var txhash = result;
    txhash = "https://ropsten.etherscan.io/tx/"+txhash;
    if(confirm("是否要查詢交易結果")){
      console.log(txhash);
      window.open(txhash);
    }
  });
});
  

  $("#certificate_upload").change(function(){
    previewFiles(this.files) // this即為<input>元素
  })
  
  function previewFiles(files) {
    if (files && files.length >= 1) {
        $.map(files, file => {
            convertFile(file)
                .then(data => {
                  //console.log(data) // 把編碼後的字串輸出到console
                  data_base64 = data
                })
                .catch(err => console.log(err))
        })
    }
  }

// 使用FileReader讀取檔案，並且回傳Base64編碼後的source
function convertFile(file) {
    return new Promise((resolve,reject)=>{
        // 建立FileReader物件
        let reader = new FileReader()
        // 註冊onload事件，取得result則resolve (會是一個Base64字串)
        reader.onload = () => { resolve(reader.result) }
        // 註冊onerror事件，若發生error則reject
        reader.onerror = () => { reject(reader.error) }
        // 讀取檔案
        reader.readAsDataURL(file)
    })
} 

 window.onload = function () {
     document.getElementById('certificate_upload').onchange = readFile;
 };
 
 function readFile() {
   file = this.files[0];
   document.getElementById('filename').value = file.name;
   var fReader = new FileReader();           
   fReader.onload = function (event) {
     message = event.target.result;
     //console.log(message);
   };
   fReader.readAsText(file);
 }

 