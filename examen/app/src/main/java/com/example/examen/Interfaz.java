package com.example.examen;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.widget.ArrayAdapter;
import android.widget.TableLayout;
import android.widget.TextView;

import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class Interfaz extends AppCompatActivity {
    TextView tvusuario,tvrol, tvmateria,tvnota1,tvnota2,tvnota3;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_interfaz);

        tvusuario = findViewById(R.id.textviewnombre);
        tvrol = findViewById(R.id.textviewrol);

        tvmateria=findViewById(R.id.tvmateria);
        tvnota1=findViewById(R.id.tvnota1);
        tvnota2=findViewById(R.id.tvnota2);
        tvnota3=findViewById(R.id.tvnota3);

        Intent intent = getIntent();

        String rol = intent.getStringExtra("rol");
        String usuario =intent.getStringExtra("user");

        tvrol.setText(rol);
        tvusuario.setText(usuario);

        final String user = tvusuario.getText().toString();
        Response.Listener<String> responseListener = new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                try {
                    JSONObject JSONResponse = new JSONObject(response);

                    boolean success= JSONResponse.getBoolean("success");
                    if(success){
                        tvmateria.setText(JSONResponse.getString("materia"));
                        tvnota1.setText(JSONResponse.getString("nota1"));
                        tvnota2.setText(JSONResponse.getString("nota2"));
                        tvnota3.setText(JSONResponse.getString("nota3"));
                    }else{
                        AlertDialog.Builder builder= new AlertDialog.Builder(Interfaz.this);
                        builder.setMessage("No hay dayos").setNegativeButton("Retry",null).create().show();
                    }
                }catch (JSONException e){
                    e.printStackTrace();
                }
            }
        };
        DataRequest dataRequest = new DataRequest(user,responseListener);
        RequestQueue queue = Volley.newRequestQueue(Interfaz.this);
        queue.add(dataRequest);






    }


}
