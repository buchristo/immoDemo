import { useState } from "react"
import SuitorData from "./SuitorData";
import PreferredContact from "./PreferredContact";
import SuitorRequest from "./SuitorRequest";

export default function RequestForm(){
const [title, setTitle] = useState("");
const [firstName, setFirstName] = useState("");
const [lastName, setLastName] = useState("");
const [company, setCompany] = useState("");
const [street, setStreet] = useState("");
const [streetNumber, setStreetNumber] = useState("");
const [zipCode, setZipCode] = useState("");
const [city, setCity] = useState("");
const [phoneNumber, setPhoneNumber] = useState("");
const [faxNumber, setFaxNumber] = useState("");
const [mobileNumber, setMobileNumber] = useState("");
const [email, setEmail] = useState("");

const [contactViaEmail, setContactViaEmail] = useState(false);
const [contactViaPhone, setContactViaPhone] = useState(false);
const [contactViaMobile, setContactViaMobile] = useState(false);
const [contactViaFax, setContactViaFax] = useState(false);
const [contactViaLetter, setContactViaLetter] = useState(false);

const [requestViewing, setRequestViewing] = useState(false);
const [requestCallback, setRequestCallback] = useState(false);
const [requestDetails, setRequestDetails] = useState(false);

const handleSubmit = async (e) => {
    e.preventDefault();

    const formData = {
        title,
        firstName,
        lastName,
        company,
        street,
        streetNumber,
        zipCode,
        city,
        phoneNumber,
        faxNumber,
        mobileNumber,
        email,
        contactViaEmail,
        contactViaPhone,
        contactViaMobile,
        contactViaFax,
        contactViaLetter,
        requestViewing,
        requestCallback,
        requestDetails
    };

    try {
        const response = await fetch("http://localhost/immoDemo/src/controller/submit.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(formData)
        });

        const responseData = await response.json();
        console.log("Server Response", responseData);
    } catch (error) {
        console.error("ERROR:", error)
    }
};

    return (
        <>
            <div>
                <div className="Header">
                    <h1>Anfrage</h1>
                </div>
                <div className="formContainer">
                    <form onSubmit={handleSubmit}>
                        <SuitorData
                            setTitle = {setTitle}
                            setFirstName = {setFirstName}
                            setLastName = {setLastName}
                            setCompany = {setCompany}
                            setStreet = {setStreet}
                            setStreetNumber = {setStreetNumber}
                            setZipCode = {setZipCode}
                            setCity = {setCity}
                            setPhoneNumber = {setPhoneNumber}
                            setFaxNumber = {setFaxNumber}
                            setMobileNumber = {setMobileNumber}
                            setEmail = {setEmail}
                            contactViaFax = {contactViaFax}
                            contactViaPhone = {contactViaPhone}
                            contactViaMobile = {contactViaMobile}
                        />
                        <PreferredContact
                            setContactViaEmail = {setContactViaEmail}
                            setContactViaPhone = {setContactViaPhone}
                            setContactViaMobile = {setContactViaMobile}
                            setContactViaFax = {setContactViaFax}
                            setContactViaLetter = {setContactViaLetter}
                        />
                        <SuitorRequest
                            setRequestViewing = {setRequestViewing}
                            setRequestCallback = {setRequestCallback}
                            setRequestDetails = {setRequestDetails}
                        />
                        <div className="buttonContainer">
                            <button>Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </>
    )
}