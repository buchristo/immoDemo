

export default function ThankYou({setIsPosted}){

    return (
        <>
            <div className="thankYouContainer">
                <h1>Vielen Dank für Ihre Anfrage</h1>
                <div>
                    <button onClick={() => setIsPosted()}>Zurück</button>
                </div>
            </div>
        </>
    )
}