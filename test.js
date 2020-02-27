FlexitiSDK = function (params) {
    var self = this;

    self.clientID = params.clientID || null;
    self.clientSecret = params.clientSecret || null;
    self.authToken = params.authToken || null;

    //optional
    self.amountRequested = params.amountRequested || null;

    self.access_token = params.access_token || null;
    self.clientID = params.clientID;
    self.querySelector = params.querySelector || null;
    self.iframeContainer = params.iframeContainer || null;
    self.customerData = params.customer || null;

    self.env = params.env || null;

    self.lang = params.lang || null;


    /*
        Environment
    */

    var envsAllowed = ['dev', 'stg', 'uat', 'training', 'prod'];
    var urls = {
        'dev': 'https://onlineapi-dev.flexiti.fi',
        'stg': 'https://onlineapi-stg.flexiti.fi',
        'uat': 'https://onlineapi-uat.flexiti.fi',
        'wayfair': 'https://onlineapi-wayfair.flexiti.fi',
        'training': 'https://onlineapi-training.flexiti.fi',
        'prod': 'https://onlineapi.flexiti.fi'
    }
    if (!self.env) {
        self.env = 'prod';
        console.warn('There is not any environment selected. Therefore, it will be used production.');
    }

    //Validation
    if (envsAllowed.indexOf(self.env) < -1) {
        console.error('The environment selected does not exist.');
    }

    // Set url 
    self._url = urls[self.env];



    /* 
        Methods 
                */
    self.OAuthLogin = function (params) {
        var p = params || {};
        var clientID = p.clientID || self.clientID || null;
        var clientSecret = p.clientSecret || self.clientSecret || null;

        /*  
            Validations 
        */
        if (!clientID || !clientSecret) {
            var errorMsg = 'There are empty required fields';
            console.error(errorMsg);
            return new Error(errorMsg);
        }

        var request = new XMLHttpRequest();
        request.open('POST', self._url + '/flexiti/online-api/oauth/token', true);
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');

        var data = 'grant_type=client_credentials&client_id=' + clientID + '&client_secret=' + clientSecret;

        request.send(data);

        return new Promise(function (resolve, reject) {
            request.onload = function () {
                if (request.status >= 200 && request.status < 400) {
                    var response = JSON.parse(request.responseText);
                    if (response.access_token) {
                        self.access_token = response.access_token;
                    }
                    resolve(request.responseText);
                } else {
                    console.error(request.responseText);
                    reject(request.responseText);
                }
            };

            request.onerror = function (e) {
                console.error(e);
                reject(e)
            };
        });
    }

    self.dataSet = function (params) {
        var p = params || {};
        var clientID = p.clientID || self.clientID || null;
        var access_token = p.access_token || self.access_token || null;
        var amountRequested = p.amountRequested || self.amountRequested || null;
        var customerData = p.customerData || self.customerData || null;
        var lang = p.lang || self.lang || null;

        /*  
            Validations 
        */
        if (!clientID || !access_token) {
            var errorMsg = 'There are some empty required fields';
            console.error(errorMsg);
            return new Error(errorMsg);
        }

        var request = new XMLHttpRequest();
        request.open('POST', self._url + '/flexiti/online-api/online/client-id/' + clientID + '/systems/init', true);
        request.setRequestHeader('Authorization', 'Bearer ' + access_token);
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');

        var data = (amountRequested && amountRequested !== '') ? 'amount_requested=' + amountRequested : '';

        if (customerData) {
            for (var key in customerData) {
                data += '&' + key + '=' + customerData[key]
            }
        }
        if (lang) {
            data += '&lang=' + lang;
        }
        request.send(data);

        return new Promise(function (resolve, reject) {
            request.onload = function () {
                if (request.status >= 200 && request.status < 400) {
                    resolve(request.responseText);
                } else {
                    console.error(request.responseText);
                    reject(request.responseText);
                }
            };

            request.onerror = function (e) {
                console.error(e);
                reject(e)
            };
        });
    }


    self.render = function (params) {
        var p = params || {};
        var querySelector = p.querySelector || self.querySelector || null;
        /*  
            Validations 
        */
        if (!querySelector) {
            var errorMsg = 'It is missing a querySelector';
            console.error(errorMsg);
            return new Error(errorMsg);
        }

        var buttonContainer = document.querySelector(querySelector);
        var flxButton = document.createElement('a');
        flxButton.onclick = 'return false;';
        flxButton.style = 'cursor:pointer;padding: 10px 20px;font-weight:600;font-family: sans-serif;border:0px; background-color:#f8f8f8; display:table;';

        /* Logo IMG */
        var logoButton = document.createElement('img');
        logoButton.src = 'https://online-uat.flexiti.fi/assets/logo_en_w.png';
        logoButton.style = 'height: 22px;';

        flxButton.appendChild(logoButton);
        flxButton.innerHTML += '<span style="display: table-cell;vertical-align: middle; padding:0px;">Flexiti Payment</span>';
        buttonContainer.appendChild(flxButton);

        flxButton.onclick = function () {
            self.financeNow(params);
        };
    }

    /*
    *   Params required:
    *       'username', 
            'password', 
            'authToken', 
            'clientID', 
            'selector'
            'amount_requested'

            'customerData': 
                'fname'
                'mname'
                'lname'
                'dob'
                'phone_number'
                'email'
                'address_1'
                'address_2'
                'city'
                'province'
                'postal_code'
                'merchant_order_id'
                'is_guest'
                'has_previous_purchase'
                'lang'
                'flow'

    */
    self.simpleRenderButton = function (params) {
        var p = params || {};
        var customerData = p.customerData || self.customerData || null;
        var amountRequested = p.amountRequested || self.amountRequested || null;
        var querySelector = p.querySelector || self.querySelector || null;

        self.OAuthLogin().then((res) => {
            self.render({
                customerData: customerData || null,
                amountRequested: amountRequested || null,
                renderType: 'button',
                querySelector: querySelector
            });
        })
    }

    /* 
        IFrame implementation 
    */
    self.simpleRenderIframe = function (params) {
        var p = params || {};
        var customerData = p.customerData || self.customerData || null;
        var amountRequested = p.amountRequested || self.amountRequested || null;
        var querySelector = p.querySelector || self.querySelector || null;
        var iframeContainer = p.iframeContainer || self.iframeContainer || null;

        self.OAuthLogin().then((res) => {
            self.render({
                customerData: customerData || null,
                amountRequested: amountRequested || null,
                renderType: 'iframe',
                querySelector: querySelector,
                iframeContainer: iframeContainer
            });
        })
    }

    self.financeNow = function (params) {
        var p = params || {};
        var renderType = p.renderType || self.renderType || 'button';
        var customerData = p.customerData || self.customerData || null;
        var amountRequested = p.amountRequested || self.amountRequested || null;
        var querySelector = p.querySelector || self.querySelector || null; //required 
        var iframeContainer = p.iframeContainer || self.iframeContainer || querySelector || null; //required 

        self.dataSet({
            customerData: customerData,
            amountRequested: amountRequested
        }).then(function (r) {
            var jsonResponse = JSON.parse(r);
            /*
                Button
            */
            if (renderType === 'button') {
                var jsonResponse = JSON.parse(r);
                window.location = jsonResponse.redirection_url;
            }

            /* 
                IFrame
            */
            if (renderType === 'iframe') {
                /*
                *   Validation
                */
                if (!iframeContainer) {
                    var errorMsg = 'It is missing a iframeContainer';
                    console.error(errorMsg);
                    return new Error(errorMsg);
                }

                var _iframeContainer = document.querySelector(iframeContainer);
                var code = '<iframe id="flx-online" name="flx-online" src="' + jsonResponse.redirection_url + '" style="overflow:hidden;height:600px;width:100%;border:0px;" frameborder="0" sandbox="allow-forms allow-pointer-lock allow-popups allow-same-origin allow-scripts allow-top-navigation" >&lt;/iframe>';
                _iframeContainer.innerHTML = code;

            }
        })
    }

    // Reduce OAauthLogin and dataSet methods in one call. 
    self.OAuthInit = function (params) {
        var p = params || {};

        return self.OAuthLogin(p).then(function (res) {
            return self.dataSet(p)
        });
    }
}