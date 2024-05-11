

export default function SuitorRequest({
    setRequestViewing,
    setRequestCallback,
    setRequestDetails
}){

        return (
            <>
            <div className="requestContainer">
                <div className="viewingCheck">
                    <input type="checkbox" id="viewingCheckbox" onChange={(e) => setRequestViewing(e.target.checked)}/>
                    <label htmlFor="viewingCheckbox" >Besichtigung</label>
                </div>
                <div className="callbackCheck">
                    <input type="checkbox" id="callbackCheckbox" onChange={(e) => setRequestCallback(e.target.checked)}/>
                    <label htmlFor="callbackCheckbox" >Kontakt</label>
                </div>
                <div className="detailCheck">
                    <input type="checkbox" id="detailCheckbox" onChange={(e) => setRequestDetails(e.target.checked)}/>
                    <label htmlFor="detailCheckbox" >Detailinformationen</label>
                </div>
            </div>
            </>
        )
    }