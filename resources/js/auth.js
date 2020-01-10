export function registerUser(credentials){
    return new Promise((res,rej)=>{
        axios.post('/api/auth/register', credentials)
            .then(response => {
                res(response.dat)
            })
            .catch(err => {
                rej('An error occured.. try again later.')
            })
    })
}

export function login(credentials){
    return new Promise((res,rej)=>{
        axios.post('/api/auth/login', credentials)
            .then(response =>  res(response))
            .catch(err => rej(err))
    })
}

export function getLoggedinUser(){
    const userStr = localStorage.getItem('user')

    if(!userStr){
        return null
    }

    return JSON.parse(userStr)
}