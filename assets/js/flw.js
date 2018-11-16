'use strict';

var button, form, modalForm, modalDetails, payForm, fname, amount, currencyOption, givings, country, email, donorAddress, more, phone, addy, transRef, donorFname, donorLname, donorEmail, donorNumber, donorAddress, verifyFname, verifyAmt, verifyCurr, verifyCount, verifyGiv, verifyEmail, verifyPhone, verifytransRef, verifyAddy, countryCode, adminSubAccountId, subAccountLists, subAccountIdLists, subAccountIds, subAccounts, subAccountArrays,
subaccountErr, editForm, modalSuccess, paymentMessage, modalAjaxLoader;


// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var spanOne = document.getElementsByClassName("close")[0];

// Get the <span> element that closes the modal
var spanTwo = document.getElementsByClassName("close")[1];

// Get the <span> element that closes the modal
var spanThree = document.getElementsByClassName("close")[2];

// When the user clicks on the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spanOne.addEventListener('click', function() {
  console.log("clicked");
  modal.style.display = "none";
});

spanTwo.addEventListener('click', function() {
  modal.style.display = "none";
});

spanThree.addEventListener('click', function() {
  modalSuccess.classList.add('hide');
  modalDetails.classList.add('hide');
  modalForm.classList.remove('hide');
  modal.style.display = "none";
  form.reset();

});

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
      modalSuccess.classList.add('hide');
      modalDetails.classList.add('hide');
      modalForm.classList.remove('hide');
      modal.style.display = "none";
      form.reset();
    }
}

form = document.querySelector("#pay-form"), redirectUrl;
modalDetails = document.querySelector(".modal-details");
modalForm = document.querySelector(".modal-form");
modalAjaxLoader = document.querySelector(".modal-loader");
more = document.querySelector("#more");
addy = document.querySelector("#hide");
amount = document.querySelector("#amount");
currencyOption = document.querySelector("#currency-option");
country = document.querySelector("#country");
givings = document.querySelector("#givings");
donorFname = document.querySelector("#fname");
donorLname = document.querySelector("#lname");
donorEmail = document.querySelector("#email");
donorNumber = document.querySelector("#phonenumber");
donorAddress = document.querySelector("#addy");
verifyFname = document.querySelector(".verify-fname");
verifyAmt = document.querySelector(".verify-amt");
verifyCurr = document.querySelector(".verify-curr");
verifyCount = document.querySelector(".verify-count");
verifyGiv = document.querySelector(".verify-giv");
verifytransRef = document.querySelector(".verify-transRef");
verifyEmail = document.querySelector(".verify-email");
verifyPhone = document.querySelector(".verify-phone");
verifyAddy = document.querySelector(".verify-addy");
subaccountErr = document.querySelector("#subaccount-error");
editForm = document.querySelector(".back");


more.addEventListener('click', function(){
    addy.classList.toggle("hide");
})


form.addEventListener('submit', function(event){
    event.preventDefault();
    
    if(modalDetails.classList.contains('hide')) {
      subAccountLists = [];
      subAccountIdLists = [];
      subAccountIds =  flw_rave_options.sub_account_ids.split (",");
      subAccounts =  flw_rave_options.sub_accounts.split (",");
      subAccountIds.forEach(subAccountId => {
        subAccountIdLists.push(subAccountId);
      });

      subAccounts.forEach(subAccount => {
        subAccountLists.push(subAccount);
      });

    subAccountArrays = {};
    for (var i = 0; i < subAccountIdLists.length; i++) {
      var theSubAccountLists = subAccountLists[i];
      subAccountArrays[theSubAccountLists] = subAccountIdLists[i];
    }


    for (var subAccountArray in subAccountArrays) {
      // check if the property/key is defined in the object itself, not in parent
      if (subAccountArrays.hasOwnProperty(subAccountArray)) {           
          if (givings.value == subAccountArray) {
            adminSubAccountId = subAccountArrays[subAccountArray];
          }else{
            console.log(false);
          }
      }
    }
    modalForm.classList.add('hide')
    modalDetails.classList.remove('hide')
  }else {
    modalDetails.classList.add('hide')
    modalForm.classList.remove('hide')
  }

    
  if (donorAddress === ""){
    verifyAddy.innerText = "";
  }else {
    verifyAddy.innerText = donorAddress.value;
  }
  transRef = "GVHR-"+Date.now();
  verifyFname.innerText = donorFname.value +" "+donorLname.value
  verifyAmt.innerText = amount.value
  verifyCurr.innerText = currencyOption.value
  verifyCount.innerText = country.value
  verifytransRef.innerText = transRef
  verifyGiv.innerText = givings.value
  verifyEmail.innerText = donorEmail.value
  verifyPhone.innerText = donorNumber.value

  switch (currencyOption.value) {
      case "KES":
          countryCode = "KE";
          break;
      case "GHS":
          countryCode = "GH";
          break;
      case "ZAR":
          countryCode = "ZA";
          break;
      default:
          countryCode= "NG";
          break;
  }
})


// editForm.addEventListener("click", function(){
//   if(modalForm.classList.contains('hide')) {
//     verifyFname.innerText = "Fullname: "+donorName;
//     verifyAmt.innerText="Amount: "+amount;
//     verifyCurr.innerText="Currency: "+currencyOption;
//     verifyCount.innerText="Country: "+country;
//     transRef = "GVHR-"+Date.now();
//     verifytransRef.innerText="Transaction Reference: "+transRef;
//     verifyGiv.innerText="Giving For: "+givings;
//     verifyEmail.innerText="Email: ";
//     verifyPhone.innerText="Phone Number: ";
//     verifyAddy.innerText="";
//     modalForm.classList.remove('hide');
//     modalDetails.classList.add('hide');
//   }else{
//     modalForm.classList.add('hide');
//     modalDetails.classList.remove('hide');
//   }
// })

var payNow = document.getElementById("paynow");

payNow.addEventListener('click', function(e) {
  e.preventDefault();
  var paymentObject = {
    amount: amount.value,
    customer_firstname: donorFname.value,
    customer_lastname: donorLname.value,
    customer_email: donorEmail.value,
    country: countryCode,
    currency: currencyOption.value,
    customer_phone: donorNumber.value,
    custom_description: givings.value,
    custom_logo: flw_rave_options.logo,
    custom_title: flw_rave_options.title,
    "meta": [{metaname: "Purpose Of Giving", metavalue: givings.value}, {metaname: "Country", metavalue: country.value}, {metaname: "Address", metavalue: donorAddress.value}],
    PBFPubKey: flw_rave_options.pbkey,
    redirect_url: flw_rave_options.redirectUrl,
    txref: transRef,
    subaccounts: [{id: adminSubAccountId}],
    onclose: function() {

    },
    callback: function(res) {
      handleResponse(res, form);
      x.close();
    }
  }

  document.getElementById("myModal").style.display = "none";
  var x = getpaidSetup(paymentObject);

})



var handleResponse =  function(res, form) {
  modalDetails.classList.add('hide');
  modalAjaxLoader.classList.remove('hide');
  modal.style.display = "block";
  // console.log(res);
    var args  = {
      action: 'process_payment',
      flw_sec_code: jQuery( form ).find( '#flw_sec_code' ).val(),
    };

    var dataObj = Object.assign( {}, args, res.tx );

    jQuery
      .post( flw_rave_options.cb_url, dataObj )
      .success( function(data) {
        // console.log(data);
    if(redirectUrl == '' || redirectUrl == undefined) {
      paymentMessage = document.querySelector("#notice");
      modalSuccess = document.querySelector(".modal-success");
      modalSuccess.classList.add('hide');
      modalDetails.classList.add('hide');
      modalForm.classList.remove('hide');

      amount.value;
      currencyOption.value;
      givings.value;
      country.value;
      donorFname.value;
      donorLname.value;
      donorEmail.value;
      donorNumber.value;
      donorAddress.value;

      form.reset();
      var displayModal = function(){
        if(modalSuccess.classList.contains('hide')) {
          modalForm.classList.add('hide');
          modal.style.display = "block";
          modalSuccess.classList.remove('hide');
          modalDetails.classList.add('hide');
        }else {
          modalSuccess.classList.add('hide');
          modalDetails.classList.add('hide');
          modalForm.classList.add('hide');
          modal.style.display = "none";
        }
        paymentMessage.innerText = 'Thank you for your donation of '+res.tx["currency"] + " " + res.tx["amount"] + ". Your payment was "+res.tx["status"];
        // console.log(res);
      }
      modalAjaxLoader.classList.add('hide');
      modal.style.display = "none";
      displayModal();
    } else {
      setTimeout(redirectTo, 5000, res.tx["redirect_url"]);
    }
  });
}




var submitForm = jQuery( '.flw-simple-pay-now-form' ),
  redirectUrl;

if ( submitForm ) {

  submitForm.submit(function(evt) {
    evt.preventDefault();
    var config = buildConfigObj( this );
    processCheckout( config );
  } );

}


/**
 * Builds config object to be sent to GetPaid
//  *
//  * @return object - The config object
//  */

var processCheckout = function(opts) {
  getpaidSetup( opts );
};

/**
 * Sends payment response from GetPaid to the process payment endpoint
 *
 * @param object Response object from GetPaid
 *
 * @return void
 */

/**
 * Redirect to set url
 *
 * @param string url - The link to redirect to
 *
 * @return void
 */
var redirectTo = function( url ) {

  if ( url ) {
    location.href = url;
  }

};
