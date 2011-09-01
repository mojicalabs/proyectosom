<?php     

echo form_open(current_url()); ?>
<?php echo $custom_error; ?>
<?php echo form_hidden('id',$result->id) ?>

                                    <p><label for="nombreCompletoUsuario">NombreCompletoUsuario<span class="required">*</span></label>                                
                                    <input id="nombreCompletoUsuario" type="text" name="nombreCompletoUsuario" value="<?php echo $result->nombreCompletoUsuario ?>"  />
                                    <?php echo form_error('nombreCompletoUsuario','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="nombreUsuario">NombreUsuario<span class="required">*</span></label>                                
                                    <input id="nombreUsuario" type="text" name="nombreUsuario" value="<?php echo $result->nombreUsuario ?>"  />
                                    <?php echo form_error('nombreUsuario','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="claveUsuario">ClaveUsuario<span class="required">*</span></label>                                
                                    <input id="claveUsuario" type="text" name="claveUsuario" value="<?php echo $result->claveUsuario ?>"  />
                                    <?php echo form_error('claveUsuario','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="nivelUsuario">NivelUsuario<span class="required">*</span></label>                                
                                    <input id="nivelUsuario" type="text" name="nivelUsuario" value="<?php echo $result->nivelUsuario ?>"  />
                                    <?php echo form_error('nivelUsuario','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="fechaRegistro">FechaRegistro<span class="required">*</span></label>                                
                                    <input id="fechaRegistro" type="text" name="fechaRegistro" value="<?php echo $result->fechaRegistro ?>"  />
                                    <?php echo form_error('fechaRegistro','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="estado">Estado<span class="required">*</span></label>                                
                                    <input id="estado" type="text" name="estado" value="<?php echo $result->estado ?>"  />
                                    <?php echo form_error('estado','<div>','</div>'); ?>
                                    </p>
                                    
<p>
        <?php echo form_submit( 'submit', 'Submit'); ?>
</p>

<?php echo form_close(); ?>