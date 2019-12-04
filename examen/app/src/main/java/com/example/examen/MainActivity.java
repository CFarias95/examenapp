package com.example.examen;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.Serializable;

public class MainActivity extends AppCompatActivity {
    EditText etusuario, etpassword;
    Button btn_login;
    TextView elusuario, lascontras, tv_registro;



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        btn_login = findViewById(R.id.btningresar);
        etusuario = findViewById(R.id.correo);
        etpassword = findViewById(R.id.pass);
        elusuario =findViewById(R.id.elusu);
        lascontras = findViewById(R.id.lapass);
        tv_registro = findViewById(R.id.btn_reg);
        tv_registro.setOnClickListener(new OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intentReg = new Intent(MainActivity.this,Interfaz.class);
                MainActivity.this.startActivity(intentReg);
            }
        });

        btn_login.setOnClickListener(new OnClickListener(){
            @Override
            public void onClick(View v){

                final String user = etusuario.getText().toString();
                final String pass = etpassword.getText().toString();
                Response.Listener<String> responseListener = new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                        JSONObject JSONResponse = new JSONObject(response);

                        boolean success= JSONResponse.getBoolean("success");
                        if(success){
                            String  rol = JSONResponse.getString("rol");
                            Intent intentlog = new Intent(MainActivity.this,Interfaz.class);
                            intentlog.putExtra("rol",rol);
                            intentlog.putExtra("user",user);

                            MainActivity.this.startActivity(intentlog);
                        }else{
                            AlertDialog.Builder builder= new AlertDialog.Builder(MainActivity.this);
                            builder.setMessage("No se pudo ingresar").setNegativeButton("Retry",null).create().show();
                        }
                        }catch (JSONException e){
                            e.printStackTrace();
                        }
                    }
                };
                LoginRequest loginRequest = new LoginRequest(user,pass,responseListener);
                RequestQueue queue = Volley.newRequestQueue(MainActivity.this);
                queue.add(loginRequest);

            }
        });
    }


}
