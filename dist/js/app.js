const request = axios.create({
	baseURL: 'https://api.github.com',
	headers: {
		Authorization: `token ${TOKEN}`
	}
})
request
	.get('/users/Shogo1') // ***部分を自分のアカウント名に置き換える
	.then(res => res.data)
	.then(console.log)
