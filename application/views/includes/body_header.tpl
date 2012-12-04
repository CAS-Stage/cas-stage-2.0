        <header>
            {if isset($usuario)}
            <p>Conectado como: <em>{$usuario.nombre}</em>
                <a href="{''|base_url}bienvenido/logout.html">[Cerrar sesión]</a>
                <a rel="external" href="{''|base_url}docs/manual.pdf" onclick="window.open('{''|base_url}docs/manual.pdf'); return false;">[Ayuda]</a>
            </p>
            {/if}
            <h1>CAS Stage Ltda.</h1>
            {if isset($usuario)}
            {assign var=location value=''|current_url}
            {if '/menu\.html/'|preg_match:$location}
            {assign var='segment' value=''}
            {/if}
            <nav id="breadcrumb">
                Usted está en:
                <ul>
                    <li>
                        <a href="{''|base_url}">Sistema CAS Stage</a>
                        {if ''|base_url neq ''|current_url && not {'/menu\.html/'|preg_match:$location}}
                        <ul>
                            <li>
                                
                                
                                {if '/'|cat:'(tipos_contrato)/'|preg_match:$location}
                                {assign var=segment value='tipos_contrato'}
                                {/if}
                                {if '/'|cat:'(registro_empleados)/'|preg_match:$location}
                                {assign var=segment value='registro_empleados'}
                                {/if}
                                {if '/'|cat:'(registro_mensual)/'|preg_match:$location}
                                {assign var=segment value='registro_mensual'}
                                {/if}
                                {if '/'|cat:'(parametros_externos)/'|preg_match:$location}
                                {assign var=segment value='parametros_externos'}
                                {/if}
                                {if '/'|cat:'(informes)/'|preg_match:$location}
                                {assign var=segment value='informes'}
                                {/if}
                                
                                <a href="{''|base_url}{$segment}.html">
                                
                                {if '/tipos_contrato(\/|\.)/'|preg_match:$location}{assign var=segment value='tipos_contrato'}Tipos de Contrato{/if}
                                {if '/registro_empleados(\/|\.)/'|preg_match:$location}{assign var=segment value='registro_empleados'}Registro de Empleados{/if}
                                {if '/registro_mensual(\/|\.)/'|preg_match:$location}{assign var=segment value='registro_mensual'}Registro Mensual{/if}
                                {if '/parametros_externos(\/|\.)/'|preg_match:$location}{assign var=segment value='parametros_externos'}Actualizar Parámetros Externos{/if}
                                {if '/informes(\/|\.)/'|preg_match:$location}{assign var=segment value='informes'}Generación de Informes{/if}
                                </a>
                                {if '/'|cat:$segment:'[a-z0-9_]*\/([0-9]*|\.html|\/[a-z0-9_]*\.html)/'|preg_match:$location}
                                <ul>
                                    <li>
                                        {if '/'|cat:$segment:'\/actualizar(\/|\.)/'|preg_match:$location}{assign var=segment value='actualizar'}Actualizar{/if}
                                        {if '/'|cat:$segment:'\/actualizar_pacto_salud(\/|\.)/'|preg_match:$location}{assign var=segment value='actualizar_pacto_salud'}Actualizar pacto de Salud{/if}
                                        {if '/'|cat:$segment:'\/agregar(\/|\.)/'|preg_match:$location}{assign var=segment value='agregar'}Agregar{/if}
                                        {if '/'|cat:$segment:'\/baja(\/|\.)/'|preg_match:$location}{assign var=segment value='baja'}Baja{/if}
                                        {if '/'|cat:$segment:'\/modificar(\/|\.)/'|preg_match:$location}{assign var=segment value='modificar'}Modificar{/if}
                                        {if '/'|cat:$segment:'\/recontratar(\/|\.)/'|preg_match:$location}{assign var=segment value='recontratar'}Recontratar{/if}

                                        <!--
                                        {if '/'|cat:$segment:'[a-z0-9_]*\/[a-z0-9_]*\/[a-z0-9_]*([0-9]*|\.html|\/[a-z0-9_]*\.html)/'|preg_match:$location}
                                        <a href="{$location}">
                                        {else}
                                        <a href="{$location}/../bienvenido.html">
                                        {/if}
                                        
                                        -->
                                        
                                        
                                        {assign var=subsegment value=$segment}
                                        
                                        {if '/'|cat:'(ficha_empleado)/'|preg_match:$location}
                                        {assign var=subsegment value=$segment|cat:'/ficha_empleado'}
                                        {/if}
                                        {if '/'|cat:'(listado_empleados)/'|preg_match:$location}
                                        {assign var=subsegment value=$segment|cat:'/listado_empleados'}
                                        {/if}
                                        {if '/'|cat:'(liquidaciones_sueldo)/'|preg_match:$location}
                                        {assign var=subsegment value=$segment|cat:'/liquidaciones_sueldo'}
                                        {/if}
                                        {if '/'|cat:'(nomina_anticipos)/'|preg_match:$location}
                                        {assign var=subsegment value=$segment|cat:'/nomina_anticipos'}
                                        {/if}
                                        {if '/'|cat:'(horas_extras)/'|preg_match:$location}
                                        {assign var=subsegment value=$segment|cat:'/horas_extras'}
                                        {/if}
                                        
                                        {if '/'|cat:'(prevision)/'|preg_match:$location}
                                        {assign var=subsegment value=$segment|cat:'/prevision'}
                                        {/if}
                                        {if '/'|cat:'(sistemas_salud)/'|preg_match:$location}
                                        {assign var=subsegment value=$segment|cat:'/sistemas_salud'}
                                        {/if}
                                        {if '/'|cat:'(sueldo_minimo)/'|preg_match:$location}
                                        {assign var=subsegment value=$segment|cat:'/sueldo_minimo'}
                                        {/if}
                                        {if '/'|cat:'(valor_uf)/'|preg_match:$location}
                                        {assign var=subsegment value=$segment|cat:'/valor_uf'}
                                        {/if}
                                        
                                        <a href="{''|base_url}{$subsegment}.html">
                                            {if '/'|cat:$segment:'\/ficha_empleado(\/|\.)/'|preg_match:$location}{assign var=segment value='ficha_empleado'}Ficha de Empleado{/if}
                                            {if '/'|cat:$segment:'\/listado_empleados(\/|\.)/'|preg_match:$location}{assign var=segment value='listado_empleados'}Listado de Empleados{/if}
                                            {if '/'|cat:$segment:'\/liquidaciones_sueldo(\/|\.)/'|preg_match:$location}{assign var=segment value='liquidaciones_sueldo'}Liquidaciones de Sueldo{/if}
                                            {if '/'|cat:$segment:'\/nomina_anticipos(\/|\.)/'|preg_match:$location}{assign var=segment value='nomina_anticipos'}Nómina de Anticipos{/if}
                                            {if '/'|cat:$segment:'\/horas_extras(\/|\.)/'|preg_match:$location}{assign var=segment value='informe_horas_extras'}Informe de Horas Extras{/if}
                                            
                                            {if '/'|cat:$segment:'\/prevision(\/|\.)/'|preg_match:$location}{assign var=segment value='prevision'}Previsión{/if}
                                            {if '/'|cat:$segment:'\/sistemas_salud(\/|\.)/'|preg_match:$location}{assign var=segment value='sistemas_salud'}Sistemas de Salud{/if}
                                            {if '/'|cat:$segment:'\/sueldo_minimo(\/|\.)/'|preg_match:$location}{assign var=segment value='sueldo_minimo'}Sueldo Mínimo{/if}
                                            {if '/'|cat:$segment:'\/valor_uf(\/|\.)/'|preg_match:$location}{assign var=segment value='valor_uf'}Valor UF{/if}
                                        </a>
                                        {if '/'|cat:'(informes|parametros_externos)\/[a-z0-9_]+\/[a-z0-9_]+(\/[0-9\-]+)*\.html/'|preg_match:$location}
                                        <ul>
                                            <li>

                                                {if '/'|cat:$segment:'\/actualizar(\/|\.)/'|preg_match:$location}Actualizar{/if}
                                                {if '/'|cat:$segment:'\/agregar(\/|\.)/'|preg_match:$location}Agregar{/if}
                                                {if '/'|cat:$segment:'\/modificar(\/|\.)/'|preg_match:$location}Modificar{/if}
                                                {if '/'|cat:$segment:'\/ver(\/|\.)/'|preg_match:$location}Ver{/if}
                                            </li>
                                        </ul>
                                        {/if}
                                    </li>
                                 </ul>
                                {/if}
                            </li>
                        </ul>
                        {/if}
                    </li>
                </ul>
            </nav>
            {/if}
        </header>