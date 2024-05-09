

export default function SuitorData({
    setTitle,
    setFirstName,
    setLastName,
    setCompany,
    setStreet,
    setStreetNumber,
    setZipCode,
    setCity,
    setPhoneNumber,
    setFaxNumber,
    setMobileNumber,
    setEmail

}){

        return (
            <>
                <div className="selectContainer">
                    <select name="anrede" id="title" onChange={(e) => setTitle(e.target.value)}>
                        <option value="Herr">Herr</option>
                        <option value="Frau">Frau</option>
                        <option value="keine Angabe">Keine Angabe</option>
                    </select>
                </div>
                <div className="nameContainer">
                    <input type="text" id="firstName" placeholder="Vorname*" required onChange={(e) => setFirstName(e.target.value)}/>
                    <input type="text" id="lastName" placeholder="Nachname*" required onChange={(e) => setLastName(e.target.value)}/>
                </div>
                <input type="text" id="company" placeholder="Firma" onChange={(e) => setCompany(e.target.value)}/>
                <div className="addressContainer">
                    <input type="text" id="street" placeholder="Straße*" required onChange={(e) => setStreet(e.target.value)}/>
                    <input type="text" id="streetNumber" placeholder="Nr.*" required onChange={(e) => setStreetNumber(e.target.value)}/>
                </div>
                <div className="zipContainer">
                    <input type="text" id="zipCode" placeholder="Postleitzahl*" required onChange={(e) => setZipCode(e.target.value)}/>
                    <input type="text" id="city" placeholder="Ort*" required onChange={(e) => setCity(e.target.value)}/>
                </div>
                <div className="contactDataContainer1">
                    <input type="text" id="phoneNumber" placeholder="Tel" onChange={(e) => setPhoneNumber(e.target.value)}/>
                    <input type="text" id="faxNumber" placeholder="Fax" onChange={(e) => setFaxNumber(e.target.value)}/>
                </div>
                <div className="contactDataContainer2">
                    <input type="text" id="mobileNumber" placeholder="Mobil" onChange={(e) => setMobileNumber(e.target.value)}/>
                    <input type="text" id="email" placeholder="Email" onChange={(e) => setEmail(e.target.value)}/>
                </div>
            </>
        )
    }