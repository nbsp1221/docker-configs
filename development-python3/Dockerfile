FROM python:3
RUN curl -fsSL https://deb.nodesource.com/setup_lts.x | bash - && \
    apt-get install -y sudo nodejs && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*
RUN pip install --no-cache-dir jupyterlab
ARG USER="docker"
ENV HOME="/home/${USER}"
ENV JUPYTER_LAB_CONFIG="${HOME}/.jupyter/jupyter_lab_config.py"
RUN useradd --create-home --shell /bin/bash ${USER} && \
    echo "${USER} ALL=(ALL) NOPASSWD:ALL" >> /etc/sudoers && \
    chown -R ${USER}:${USER} ${HOME}
USER ${USER}
COPY --chown=${USER}:${USER} configs/jupyter-lab-config.py ${JUPYTER_LAB_CONFIG}
WORKDIR ${HOME}/workspaces
CMD ["jupyter", "lab"]
