package com.example.examen;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.toolbox.StringRequest;

import java.util.HashMap;
import java.util.Map;

public class LoginRequest extends StringRequest {
    private static  final String LOGIN_REQUEST_URI ="http://appwxamen.000webhostapp.com/servicios/Login.php";
    private Map<String,String> params;
    public LoginRequest(String username, String password, Response.Listener<String> listener){
        super(Request.Method.POST, LOGIN_REQUEST_URI, listener,null);
        params = new HashMap<>();
        params.put("username",username);
        params.put("password",password);

    }
    public Map<String, String>getParams() { return params;}
}
