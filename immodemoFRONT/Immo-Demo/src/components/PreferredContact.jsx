
export default function PreferredContact({
    setContactViaEmail,
    setContactViaPhone,
    setContactViaMobile,
    setContactViaFax,
    setContactViaLetter
}){

        return (
            <>
            <div className="contactContainer">
                <div className="emailCheck">
                    <input type="checkbox" id="emailCheckbox" onChange={(e) => setContactViaEmail(e.target.checked)}/>
                    <label htmlFor="emailCheckbox" >Email</label>
                </div>
                <div className="phoneCheck">
                    <input type="checkbox" id="phoneCheckbox" onChange={(e) => setContactViaPhone(e.target.checked)}/>
                    <label htmlFor="phoneCheckbox" >Telefon</label>
                </div>
                <div className="mobileCheck">
                    <input type="checkbox" id="mobileCheckbox" onChange={(e) => setContactViaMobile(e.target.checked)}/>
                    <label htmlFor="mobileCheckbox" >Mobiltelefon</label>
                </div>
                <div className="faxCheck">
                    <input type="checkbox" id="faxCheckbox" onChange={(e) => setContactViaFax(e.target.checked)}/>
                    <label htmlFor="faxCheckbox" >Fax</label>
                </div>
                <div className="letterCheck">
                    <input type="checkbox" id="letterCheckbox" onChange={(e) => setContactViaLetter(e.target.checked)}/>
                    <label htmlFor="letterCheckbox" >Brief</label>
                </div>
            </div>
            </>
        )
    }