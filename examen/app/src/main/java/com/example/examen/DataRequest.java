package com.example.examen;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.toolbox.StringRequest;

import java.util.HashMap;
import java.util.Map;

public class DataRequest extends StringRequest {
    private static  final String DATA_REQUEST_URI ="http://appwxamen.000webhostapp.com/servicios/Buscar.php";
    private Map<String,String> params;
    public DataRequest(String username, Response.Listener<String> listener){
        super(Request.Method.POST, DATA_REQUEST_URI, listener,null);
        params = new HashMap<>();
        params.put("username",username);
    }
    public Map<String, String>getParams() { return params;}

}
