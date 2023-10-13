// set endpoint and your access key
const endpoint = 'latest'
const API_KEY = '82ef299e8d40fdf790a28dbcfea10dc6';

async function fetchCurrencyRate(currencyCode) {
    try {
        const response = await fetch("http://api.exchangeratesapi.io/v1/latest?access_key=82ef299e8d40fdf790a28dbcfea10dc6&symbols="+currencyCode)
        const data = await response.json();
        console.log(data.rates);
        return data.rates
    }
    catch(error) {
        alert("erreur : " + error)
    }
}
    


export { fetchCurrencyRate } ;
