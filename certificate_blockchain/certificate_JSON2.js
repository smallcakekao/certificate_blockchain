
$("#userdata").click(function(){
var today=new Date();

var currentDateTime =

today.getFullYear()+'年'+

(today.getMonth()+1)+'月'+

today.getDate()+'日 ('+

today.getHours()+'點'+today.getMinutes()+'分)';

const nameElement = document.getElementById("form");

JSON_write(currentDateTime,nameElement);
//console.log($("[name='sex']:checked").val());
});

function JSON_write(currentDateTime,nameElement){
    var JSON_string ={
        issuedOn: currentDateTime,
        recipient: {
          identity: nameElement[1].value,
          name: nameElement[0].value,
          TOEIC_Test_Time:nameElement[2].value,
          type: "email",
          Email: nameElement[3].value,
          Birth: nameElement[4].value,
          Sex: $("[name='sex']:checked").val()
        },
        type: "Certificate",
        Verification_address: "0xde37a07f274497caf98200e8bbf2bbcc34128445",
        certification: {
          issuer: {
            url: "http://www.toeic.com.tw/",
            name: "Test of English for International Communication",
            email: "service@examservice.com.tw",
            type: "Profile"
          },
          image: "",
          description: "證書相關資訊",
          signatureLines: 
            {
              jobTitle: "TOEIC Issuer",
              name: "TOEIC",
              type: "SignatureLine",
              image: ""
            }
        },
        id: nameElement[0].value + "_TOEIC_CERTIFICATION",
        recipientProfile: {
          name: "verifiy_on_ether",
          type:"verifiy"
        }
    }
    
    console.log(JSON.stringify(JSON_string));
    document.getElementById("JSONContent").value = JSON.stringify(JSON_string);
}
