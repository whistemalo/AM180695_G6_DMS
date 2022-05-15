package com.edu.sv.guia10.interfaces;

import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;

public class Servicio {
    public static Retrofit retrofit = new Retrofit.Builder()
            .baseUrl("http://localhost:80/sql/")
            .addConverterFactory(GsonConverterFactory.create())
            .build();

    public static APIService service =
            retrofit.create(APIService.class);

}
