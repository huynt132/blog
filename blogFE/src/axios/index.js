import axios from 'axios';
// export async function UploadFile(endpoint, file, pro_name, additional) {
//     var fd = new FormData();
//     fd.append('file', file);
//     fd.append('property_name', pro_name);
//     fd.append('additional', JSON.stringify(additional));
//     return await axios.post(`http://localhost:8000/api/${endpoint}`, fd, {
//         headers: {
//             'Content-Type': 'application/json',
//             'client_id': 'client_id_id_client',
//             'client_secret': 'client_secret_secret_client'
//         }
//     })
// }
const ax = axios.create({
    baseURL: 'http://127.0.0.1:80/blog/',
    // baseURL: 'http://localhost:3000/',
    headers: {
        // 'withCredentials': true,
        'Access-Control-Allow-Origin': '*',
        'Content-type': 'application/json',
        'Access-Control-Allow-Methods': 'POST, GET, PUT, PATCH, DELETE, OPTIONS',
    }
});

export default ax;