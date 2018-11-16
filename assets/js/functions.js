// var button, form, modalForm, modalDetails, payForm, amount, currencyOption, givings, country, email,
// more, phone, addy, transRef, donorName, donorEmail, donorNumber, donorAddress,
// verifyAmt, verifyCurr, verifyCount, verifyGiv, verifyEmail, verifyPhone, verifytransRef, countryCode;


// // Get the modal
// var modal = document.getElementById('myModal');

// // Get the button that opens the modal
// var btn = document.getElementById("myBtn");

// // Get the <span> element that closes the modal
// var span = document.getElementsByClassName("close")[0];

// // When the user clicks on the button, open the modal 
// btn.onclick = function() {
//     modal.style.display = "block";
// }

// // When the user clicks on <span> (x), close the modal
// span.onclick = function() {
//     modal.style.display = "none";
// }

// // When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//     if (event.target == modal) {
//         modal.style.display = "none";
//     }
// }

// // button = $("#give");
// form = document.querySelector("#pay-form");
// modalDetails = document.querySelector(".modal-details");
// modalForm = document.querySelector(".modal-form");
// more = document.querySelector("#more");
// addy = document.querySelector("#hide");
// // amount = $("#amount");
// // currencyOption = $("#currency-option");
// // country = $("#country");
// // givings = $("#givings");
// // donorName = $("#name");
// // donorEmail = $("#email");
// // donorNumber = $("#phonenumber");
// // verifyAmt = $(".verify-amt");
// // verifyCurr = $(".verify-curr");
// // verifyCount = $(".verify-count");
// // verifyGiv = $(".verify-giv");
// // verifytransRef = $(".verify-transRef");
// // verifyEmail = $(".verify-email");
// // verifyPhone = $(".verify-phone");

// // console.log(modalDetails);
// // console.log(modalForm);

// // console.log(form);

// more.addEventListener('click', function(){
//     addy.classList.toggle("hide");
//     console.log(addy);
// })

// form.submit(function(event){
//     event.preventDefault();
//     modalForm.ClassList.toggle("hide");
//     modalDetails.ClassList.toggle("hide");
//     amount = amount.value;
//     currencyOption = currencyOption.val();
//     givings = givings.val();
//     country = country.val();
//     donorEmail = donorEmail.val();
//     donorNumber = donorNumber.val();
//     transRef = "GVHR-"+Date.now();
//     console.log(transRef);
//     verifyAmt.append(amount);
//     verifyCurr.append(currencyOption);
//     verifyCount.append(country);
//     verifytransRef.append(transRef);
//     verifyGiv.append(givings);
//     verifyEmail.append(donorEmail);
//     verifyPhone.append(donorNumber);

//     switch (currencyOption) {
//         case "KES":
//             countryCode = "KE";
//             break;
//         case "GHS":
//             countryCode = "GH";
//             break;
//         case "ZAR":
//             countryCode = "ZA";
//             break;
//         default:
//             countryCode= "NG";
//             break;
//     }
//     console.log(countryCode);
// })


