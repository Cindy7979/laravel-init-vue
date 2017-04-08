
new Vue ({
	el:'.container',
	data: {
		is_remember:false,
		email:'',
		password:'',
		email_err:'',
		password_err:'',
		login_fail:''
	},
	methods: {
		login: function() {
			axios.post('/login', this.$data)
				.then(response => {  // ecma6 형식 : $.post() 와 같은 방식 
					// 에러 코드가 있는 경우에만 메세지 추가하고 없으면 빈 문자열 
					if (response.data.status == '422') {
						response.data.email ? this.email_err = response.data.email[0] : this.email_err = '';
						response.data.password ? this.password_err = response.data.password[0] : this.password_err = '';	

						return;
					}

					switch(response.data.code) {
						case '200' : // 로그인 성공
							window.location = response.data.redirect;
							break;
						case '401' : // 로그인 실패 
							this.login_fail = response.data.msg;
							break;
					}
				});
		}
	}
}); 