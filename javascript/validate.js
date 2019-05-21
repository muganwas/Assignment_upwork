function testEmail(text) {
    let regex = /^(([^<>()[\].,;:\s@"]+(\.[^<>()[\].,;:\s@"]+)*)|(".+"))@(([^<>()[\].,;:\s@"]+\.)+[^<>()[\].,;:\s@"]{2,})$/i;
    if (text.length > 0)
        return text.match(regex);
    else
        return false;
}
window.onload = () => {
    document.getElementById('ccnum').maxLength = 19;
    document.getElementById('expyear').maxLength = 4;
    document.getElementById('cvv').maxLength = 3;
    document.getElementById('cvv').maxLength = 3;
    document.getElementById('ccnum').addEventListener('keypress', (e) => {
        let ccnum = document.getElementById('ccnum').value;
        if (ccnum.length === 4 || ccnum.length === 9 || ccnum.length === 14) {
            document.getElementById('ccnum').value = ccnum + '-'
        }
    });
    document.getElementById('submit').addEventListener('click', (e) => {
        let date = new Date();
        let thisYear = date.getFullYear();
        var name = document.getElementById('name').value,
            number = document.getElementById('number').value,
            email = document.getElementById('email').value,
            city = document.getElementById('city').value,
            address = document.getElementById('address').value,
            state = document.getElementById('state').value,
            zip = document.getElementById('zip').value,
            cname = document.getElementById('cname').value,
            ccnum = document.getElementById('ccnum').value,
            expmonth = document.getElementById('expmonth').value,
            expyear = document.getElementById('expyear').value,
            cvv = document.getElementById('cvv').value,
            bId = document.getElementById('bId').value,
            feedback = document.getElementById('feedback');

        if (
            bId.length > 0 &&
            name.length > 0 &&
            number.length > 0 &&
            email.length > 0 &&
            address.length > 0 &&
            state.length > 0 &&
            zip.length > 0 &&
            cname.length > 0 &&
            ccnum.length > 0 &&
            expmonth.length > 0 &&
            expyear.length > 0 &&
            cvv.length > 0
        ) {
            //console.log("all filled");
            ccnum = ccnum.replace(/-/g, '');
            //console.log(ccnum)
            if (testEmail(email)) {
                if (cvv.length === 3 && !isNaN(cvv)) {
                    if (expyear.length !== 4 || isNaN(expyear) || expyear <= thisYear) {
                        e.preventDefault();
                        feedback.innerText = "The expiry year is wrong";
                    } else {
                        if (ccnum.length !== 16 || isNaN(ccnum)) {
                            e.preventDefault();
                            feedback.innerText = "Credit card number is wrong";
                        } else {
                            //proceed
                        }
                    }
                } else {
                    e.preventDefault();
                    feedback.innerText = "Your CVV is wrong";
                }
            } else {
                e.preventDefault();
                feedback.innerText = "Email format is wrong";
            }
        } else {
            e.preventDefault();
            feedback.innerText = "You need to fill all the fields!";
        }
    });

}